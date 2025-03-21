<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  // Ensure Post model is used
use App\Models\Category;

class NewsController extends Controller
{
    public function category($category)
    {
        // Find category by name
        $categoryData = Category::where('name', $category)->first();

        if (!$categoryData) {
            abort(404, "Category not found");
        }

        // Fetch news by category
        $posts = Post::where('category_id', $categoryData->id)->latest()->get();

        return view('blog.index', compact('posts', 'categoryData'));
    }
}
