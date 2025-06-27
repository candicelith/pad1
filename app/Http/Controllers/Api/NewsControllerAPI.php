<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Storage;

class NewsControllerAPI extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(3)->get(); // urutkan dari terbaru dan ambil 3 data
        return NewsResource::collection($latestNews);
    }


    public function show($id)
    {
        $news = News::findOrFail($id);

        if ($news) {
            return new NewsResource($news);
        }

        return response()->json(['message' => "News Not Found"], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Simpan file ke storage
        $path = $request->file('banner_image')->store('news-images', 'public');

        $news = News::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'banner_image' => $path, // simpan path relatifnya
        ]);

        return response()->json([
            'message' => 'Successfully Stored The News!',
            'data' => new NewsResource($news),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $news = News::findOrFail($id);

        // Kalau ada gambar baru di-upload, simpan file baru & hapus yang lama
        if ($request->hasFile('banner_image')) {
            // hapus file lama jika ada
            if ($news->banner_image && Storage::disk('public')->exists($news->banner_image)) {
                Storage::disk('public')->delete($news->banner_image);
            }

            $path = $request->file('banner_image')->store('news-images', 'public');
        } else {
            $path = $news->banner_image; // tetap pakai gambar lama
        }

        $news->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'banner_image' => $path,
        ]);

        return response()->json([
            'message' => 'Successfully updated the news!',
            'data' => new NewsResource($news),
        ], 200);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->banner_image && Storage::exists($news->banner_image)) {
            Storage::delete($news->banner_image);
        }

        $news->delete();

        return response()->json([
            'message' => 'Successfully deleted the news!',
        ], 200);
    }
}
