<?php

namespace App\Http\Controllers\v1\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return response()->json($blog);
    }

    public function add(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        try {
            $blog = Blog::create($validate);
            return response()->json($blog);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function edit($id, Request $request)
    {
        try {
            $blogEdit = Blog::findOrFail($id);
            $blogEdit->update($request->all());
            return response()->json($blogEdit);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $blogDestroy = Blog::findOrFail($id);
            $deleteBlog = $blogDestroy->delete();
            return response()->json(['success' => $deleteBlog]);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
