<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Store a new comment or reply
     */
    public function store(Request $request, String $vacancy, ?String $id = null)
    {
        // Validate the input
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comment,id_comment'
        ]);

        try {
            // Create new comment
            $comment = new Comment();
            $comment->id_vacancy = $vacancy;
            $comment->id_users = Auth::user()->id_users;
            $comment->text_comment = $validated['comment'];

            // Handle parent ID (for replies)
            if ($request->filled('parent_id')) {
                $comment->parent_id = $request->parent_id;
            } elseif ($id) {
                $comment->parent_id = $id;
            }

            $comment->save();

            // Check if this is a reply and return with anchor to new comment
            if ($comment->parent_id) {
                return redirect()->route('posts.detail', ['id' => $vacancy])
                    ->withFragment('comment-' . $comment->id_comment)
                    ->with('success', 'Reply posted successfully');
            }

            return redirect()->route('posts.detail', ['id' => $vacancy])
                ->withFragment('comment-' . $comment->id_comment)
                ->with('success', 'Comment posted successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to post comment: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Update an existing comment
     */
    public function update(Request $request, String $id)
    {
        // Validate the input
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        try {
            $comment = Comment::findOrFail($id);

            // Authorization check
            if ($comment->id_users !== Auth::user()->id_users) {
                return redirect()->back()->with('error', 'You are not authorized to edit this comment');
            }

            $comment->text_comment = $validated['comment'];
            $comment->updated_at = now(); // Explicitly update the timestamp
            $comment->save();

            return redirect()->back()
                ->withFragment('comment-' . $comment->id_comment)
                ->with('success', 'Comment updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update comment: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete a comment
     */
    public function destroy(String $id)
    {
        try {
            $comment = Comment::findOrFail($id);

            // Authorization check
            if ($comment->id_users !== Auth::user()->id_users) {
                return redirect()->back()->with('error', 'You are not authorized to delete this comment');
            }

            // Check if there are replies
            if ($comment->replies()->count() > 0) {
                // Option: Set text to "[deleted]" instead of removing completely
                $comment->text_comment = '[This comment has been deleted]';
                $comment->save();
                $message = 'Comment content has been removed';
            } else {
                // No replies, safe to delete
                $comment->delete();
                $message = 'Comment deleted successfully';
            }

            return redirect()->back()->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete comment: ' . $e->getMessage());
        }
    }
}
