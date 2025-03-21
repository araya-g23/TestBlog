<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Match;
use App\Models\Team;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::latest()->take(3)->get(); // Get latest 3 posts
//        $matches = Match::orderBy('date', 'asc')->take(5)->get(); // Get upcoming matches
//        $teams = Team::all(); // Get all teams
        return view('home', compact('posts'));
    }

    public function allNews()
    {
        $posts = Post::latest()->paginate(10); // Get all posts with pagination
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public'); // Saves in storage/app/public/uploads
        } else {
            $imagePath = null;
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blog.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', compact('post'));
    }


    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized Action');
        }
        return view('blog.edit', compact('post'));    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Ensure image is valid
        ]);

        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
        }

        $post->save();

        // Redirect back to the news page after update
        return redirect()->route('blog.index')->with('success', 'Post updated successfully!');
    }



    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized Action');
        }

        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Post deleted successfully.');
    }

}
