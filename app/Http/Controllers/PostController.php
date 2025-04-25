<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostDec;
use App\Models\PostRegistration;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil Data Table Vacancy Join Users Join User_Details Join Company
        $vacancys = DB::table('vacancy')
            ->join('users', 'vacancy.id_users', '=', 'users.id_users')
            ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->join('company', 'vacancy.id_company', '=', 'company.id_company')
            ->select(
                'vacancy.*',
                'users.*',
                'user_details.*',
                'company.*',
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
            )
            ->orderBy('id_vacancy','desc')
            ->paginate(10);


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

        // Mengembalikan View Content.Posts dengan Compact 'Vacancys'
        return view('content.posts', compact('vacancys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('content.createpost', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|exists:company,id_company',
            'vacancy_description' => 'required|string|max:500',

            'start_date'=>'required|date',
            'end_date'=>'required|date',

            'vacancy_responsibility' => 'required|array|min:1',
            'vacancy_responsibility.*' => 'required|string|max:1000',

            'vacancy_qualification' => 'required|array|min:1',
            'vacancy_qualification.*' => 'required|string|max:1000',

            'vacancy_benefits' => 'required|array|min:1',
            'vacancy_benefits.*' => 'required|string|max:1000',

            'vacancy_picture' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);


        // Handle file upload
        if ($request->hasFile('vacancy_picture')) {
            $file = $request->file('vacancy_picture');
            $filenameWithExt = $file->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('vacancy_picture')->getClientOriginalExtension();

            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $file->storeAs('public/vacancies', $filenameSimpan);
        }

        Vacancy::create([
            'id_company' => $request->company,
            'position' => $request->position,
            'id_users' => Auth::user()->id_users,
            'date_open' => $request->start_date,
            'date_closed' => $request->end_date,
            'vacancy_description' => $request->vacancy_description,
            'vacancy_responsibilities' => $request->vacancy_responsibility,
            'vacancy_qualification' => $request->vacancy_qualification,
            'vacancy_benefits' => $request->vacancy_benefits,
            'vacancy_picture' => $filenameSimpan ?? null
        ]);

        return redirect()->route('posts')->with('success', 'Berhasil menambahkan unggahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $posts, string $id)
    {
        $post = Vacancy::findorFail($id);

        // Fetch the joined vacancy data for a single item
        $vacancy = DB::table('vacancy')
            ->join('users', 'vacancy.id_users', '=', 'users.id_users')
            ->join('user_details', 'users.id_users', '=', 'user_details.id_users')
            ->join('company', 'vacancy.id_company', '=', 'company.id_company')
            ->select(
                'vacancy.*',
                'users.*',
                'user_details.*',
                'company.*',
                DB::raw("COALESCE(user_details.profile_photo, 'default_profile.png') as profile_photo"),
                DB::raw("COALESCE(vacancy.vacancy_picture, 'default-vacancy.jpg') as vacancy_picture")
            )
            ->where('id_vacancy', $id)
            ->first();

        $vacancy->vacancy_responsibilities = json_decode($vacancy->vacancy_responsibilities, true);
        $vacancy->vacancy_qualification = json_decode($vacancy->vacancy_qualification, true);
        $vacancy->vacancy_benefits = json_decode($vacancy->vacancy_benefits, true);

        $comments = $post->comments()
            ->whereNull('parent_id')
            ->with('user.userDetails')
            ->get();

        $registrations = $post->registrations()->with('user')->get();

        return view('content.detailpost', compact('post', 'vacancy', 'comments', 'posts', 'registrations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function apply(Request $request, string $id)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $vacancy = Vacancy::findorFail($id);
        $user = Auth::user();

        // Handle file upload
        $cvFile = $request->file('cv');
        $cvFileName = time() . '_' . $cvFile->getClientOriginalName();
        $cvFile->storeAs('cvs', $cvFileName, 'public');

        PostRegistration::create([
            'vacancy_id' => $vacancy->id_vacancy,
            'user_id' => $user->id_users,
            'cv' => $cvFileName,
            'status' => 'pending'
        ]);

        return redirect()->route('posts.detail', $id)->with('success', 'Berhasil mengirim lamaran');
    }

}
