<?php

namespace App\Http\Controllers\v1\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return response()->json($blog);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        try {
            $blog = Blog::create($validate);
            return response()->json($blog);
        } catch(\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $blogEdit = Blog::findOrfail($id);
            $blogEdit->update($request->all());
            return response()->json($blogEdit);
        } catch(\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blogDestroy = Blog::findOrFail($id);
            $deleteBlog = $blogDestroy->delete();
            return response()->json($deleteBlog);
        } catch(\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
