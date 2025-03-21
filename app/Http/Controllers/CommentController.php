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
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $post_id, // Make sure $post_id is correctly passed here
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }



}
