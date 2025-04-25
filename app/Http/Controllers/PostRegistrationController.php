<?php

namespace App\Http\Controllers;

use App\Models\PostRegistration;
use Illuminate\Http\Request;

class PostRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $registration = new PostRegistration();
        $registration->vacancy_id = $request->vacancy_id;
        $registration->user_id = $request->user_id;
        $registration->cv = $request->file('cv');
        $registration->save();

        return redirect()->route('posts.detail', $request->vacancy_id)->with('success', 'Berhasil mengirim lamaran');

    }
}
