<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentControllerAPI extends Controller
{
    // Get all comments for a vacancy (with nested replies)
    public function index(string $post)
    {
        $comments = Comment::where('id_vacancy', $post)
            ->whereNull('parent_id')
            ->with('replies') // eager load replies relationship
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $comments
        ]);
    }

    /**
     * Store a new comment or reply (API)
     */
    public function store(Request $request, string $vacancy, ?string $id = null)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comment,id_comment'
        ]);

        try {
            $comment = new Comment();
            $comment->id_vacancy = $vacancy;
            $comment->id_users = Auth::id();
            $comment->text_comment = $validated['comment'];

            if ($request->filled('parent_id')) {
                $comment->parent_id = $request->parent_id;
            } elseif ($id) {
                $comment->parent_id = $id;
            }

            $comment->save();

            return response()->json([
                'success' => true,
                'message' => $comment->parent_id ? 'Reply posted successfully' : 'Comment posted successfully',
                'data' => $comment
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to post comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update an existing comment (API)
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        try {
            $comment = Comment::findOrFail($id);

            if ($comment->id_users !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to edit this comment'
                ], 403);
            }

            $comment->text_comment = $validated['comment'];
            $comment->updated_at = now();
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Comment updated successfully',
                'data' => $comment
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a comment (API)
     */
    public function destroy(string $id)
    {
        try {
            $comment = Comment::findOrFail($id);

            if ($comment->id_users !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to delete this comment'
                ], 403);
            }

            if ($comment->replies()->count() > 0) {
                $comment->text_comment = '[This comment has been deleted]';
                $comment->save();
                $message = 'Comment content has been removed';
            } else {
                $comment->delete();
                $message = 'Comment deleted successfully';
            }

            return response()->json([
                'success' => true,
                'message' => $message,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
