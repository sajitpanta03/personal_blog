<?php

namespace App\Http\Controllers\v1\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return response()->json($blog);
    }

    public function blogPost($id)
    {
        $blogPost = Blog::find($id);
        return response()->json($blogPost);
    }
}
