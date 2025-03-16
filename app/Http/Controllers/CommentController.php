<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);

        Comment::create([
            'post_id' => $post_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post_id)->with('success', 'Comment added successfully!');
    }
}
