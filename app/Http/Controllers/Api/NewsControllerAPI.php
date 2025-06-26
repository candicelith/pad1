<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

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
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_image' => 'required|img'
        ]);

        $news = News::create([
            'heading' => $request->heading,
            'description' => $request->description,
            'cover_page' => $request->cover_page
        ]);

        return response()->json([
            'message' => 'Successfully Stored The News!',
            'data' => new NewsResource($news),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_page' => 'required|string'
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'cover_page' => $request->cover_page
        ]);

        return response()->json([
            'message' => 'Successfully updated the news!',
            'data' => new NewsResource($news),
        ], 200);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return response()->json([
            'message' => 'Successfully deleted the news!',
        ], 200);
    }
}
