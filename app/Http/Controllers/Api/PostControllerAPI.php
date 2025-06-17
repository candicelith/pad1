<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // 1. Tambahkan pengecekan autentikasi untuk filter khusus
            $filter = $request->input('filter');
            if (($filter == 'my_posts' || $filter == 'my_commented_posts') && !Auth::check()) {
                return response()->json([
                    "success" => false,
                    "message" => "Unauthorized. You need to be logged in to use this filter.",
                ], 401);
            }

            // Memulai query builder
            $vacancysQuery = DB::table('vacancy')
                ->join('users', 'vacancy.id_users', '=', 'users.id_users')
                ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
                ->join('company', 'vacancy.id_company', '=', 'company.id_company')
                ->select(
                    'vacancy.*',
                    'user_details.name', // Lebih baik sebutkan kolom spesifik untuk menghindari tumpang tindih
                    'company.company_name',
                    DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
                );

            if ($filter == 'my_posts') {
                $vacancysQuery->where('vacancy.id_users', Auth::id());

            } elseif ($filter == 'my_commented_posts') {
                $vacancysQuery->whereIn('vacancy.id_vacancy', function ($query) {
                    $query->select('id_vacancy')
                          ->from('comments') // 2. Koreksi nama tabel menjadi 'comments'
                          ->where('id_users', Auth::id());
                });
            }

            $vacancys = $vacancysQuery->orderBy('id_vacancy', 'desc')->paginate(10);

            // Membuat Variabel Tanggal Menjadi Lebih Dinamis dengan Tanggal Saat ini
            foreach ($vacancys as $vc) {

                $dateOpen = Carbon::parse($vc->date_open);
                $now = Carbon::now();
                $daysDifference = $dateOpen->diffInDays($now);

                if ($daysDifference < 1) {
                    $vc->date_difference = 'Today';
                } else {
                    $vc->date_difference = $daysDifference . ' days ago';
                }
            }

            return response()->json([
                "success" => true,
                "message" => "Successfully Fetched All Job Vacancies/Post",
                "data" => $vacancys
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Failed to fetch Job Vacancies/Post",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'position' => 'required|string|max:255',
                'company' => 'required|exists:company,id_company',
                'vacancy_description' => 'required|string|max:500',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'vacancy_responsibility' => 'required|array|min:1',
                'vacancy_responsibility.*' => 'required|string|max:1000',
                'vacancy_qualification' => 'required|array|min:1',
                'vacancy_qualification.*' => 'required|string|max:1000',
                'vacancy_benefits' => 'required|array|min:1',
                'vacancy_benefits.*' => 'required|string|max:1000',
                'vacancy_picture' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $filenameSimpan = null;

            if ($request->hasFile('vacancy_picture')) {
                $filenameSimpan = $request->file('vacancy_picture')->store('vacancies', 'public');
            }

            $vacancy = Vacancy::create([
                'id_company' => $request->company,
                'position' => $request->position,
                'id_users' => Auth::user()->id_users,
                'date_open' => $request->start_date,
                'date_closed' => $request->end_date,
                'vacancy_description' => $request->vacancy_description,
                'vacancy_responsibilities' => $request->vacancy_responsibility,
                'vacancy_qualification' => $request->vacancy_qualification,
                'vacancy_benefits' => $request->vacancy_benefits,
                'vacancy_picture' => $filenameSimpan
            ]);

            return response()->json([
                "success" => true,
                "message" => "Job vacancy posted successfully",
                "data" => $vacancy
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Failed to create job vacancy",
                "error" => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // 2. Gunakan Eloquent dengan eager loading untuk mengambil semua data terkait
            $vacancy = Vacancy::with([
                'user.userDetails', // Memuat user dan detail user yang membuat post
                'company',          // Memuat data perusahaan
                'comments' => function ($query) { // Memuat komentar
                    $query->whereNull('parent_id') // Hanya komentar utama (bukan balasan)
                          ->with('user.userDetails') // Beserta data pembuat komentar
                          ->orderBy('created_at', 'desc');
                },
                'registrations.user' // Memuat data pendaftar
            ])->find($id); // Mencari vacancy berdasarkan ID

            // 3. Cek jika data tidak ditemukan
            if (!$vacancy) {
                return response()->json([
                    "success" => false,
                    "message" => "Vacancy/Post not found",
                ], 404);
            }

            // 4. Kembalikan respons JSON yang sukses
            return response()->json([
                "success" => true,
                "message" => "Successfully fetched job vacancy details",
                "data" => $vacancy
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Failed to fetch job vacancy details",
                "error" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $post)
        {
            try {
                $vacancy = Vacancy::find($post);
                if (!$vacancy) {
                    return response()->json([
                        "success" => false,
                        "message" => "Vacancy not found"
                    ], 404);
                }

                // Simple field-by-field update
                if ($request->filled('position')) {
                    $vacancy->position = $request->position;
                }

                if ($request->filled('vacancy_description')) {
                    $vacancy->vacancy_description = $request->vacancy_description;
                }

                if ($request->has('vacancy_responsibility')) {
                    $vacancy->vacancy_responsibilities = $request->vacancy_responsibility;
                }

                if ($request->has('vacancy_qualification')) {
                    $vacancy->vacancy_qualification = $request->vacancy_qualification;
                }

                if ($request->has('vacancy_benefits')) {
                    $vacancy->vacancy_benefits = $request->vacancy_benefits;
                }

                if ($request->filled('start_date')) {
                    $vacancy->date_open = $request->start_date;
                }

                if ($request->filled('end_date')) {
                    $vacancy->date_closed = $request->end_date;
                }

                // Handle file upload
                if ($request->hasFile('vacancy_picture')) {
                    // Delete old picture
                    if ($vacancy->vacancy_picture) {
                        $oldPath = str_replace('/storage/', '', $vacancy->vacancy_picture);
                        if (Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    }

                    // Store new picture
                    $path = $request->file('vacancy_picture')->store('vacancies', 'public');
                    $vacancy->vacancy_picture = '/storage/' . $path;
                }

                $vacancy->save();

                return response()->json([
                    "success" => true,
                    "message" => "Vacancy updated successfully",
                    "data" => $vacancy
                ], 200);

            } catch (\Throwable $th) {
                return response()->json([
                    "success" => false,
                    "message" => "Failed to update vacancy",
                    "error" => $th->getMessage()
                ], 500);
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $vacancy = Vacancy::find($id);
            if (!$vacancy) {
                return response()->json([
                    "success" => false,
                    "message" => "Vacancy not found"
                ], 404);
            }

            // Delete associated image
            if ($vacancy->vacancy_picture && Storage::exists('public/' . $vacancy->vacancy_picture)) {
                Storage::delete('public/' . $vacancy->vacancy_picture);
            }

            $vacancy->delete();

            return response()->json([
                "success" => true,
                "message" => "Vacancy deleted successfully"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => "Failed to delete vacancy",
                "error" => $th->getMessage()
            ], 500);
        }
    }
}
