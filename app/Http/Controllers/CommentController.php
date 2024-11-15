<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(String $id)
    {
        // Validate the input
        request()->validate([
            'comment' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:comment,id'
        ]);

        $comment = new Comment();
        $comment->id_vacancy = $id;
        $comment->id_users = Auth::user()->id_users;
        $comment->text_comment = request('comment');
        $comment->parent_id = request('parent_id');
        $comment->save();

        return redirect()->route('posts.detail', ['id' => $id])->with('success', 'succesfully posted a comment');
    }
}
