<?php

namespace App\Http\Controllers\v1\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
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
            $body = $validate['body'];

            $body = $this->handleBase64Images($body);

            $validate['body'] = $body;
            $blog = Blog::create($validate);

            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $blog = Blog::findOrFail($id);

            $validate = $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);

            $body = $validate['body'];
            $body = $this->handleBase64Images($body);

            $blog->update([
                'title' => $validate['title'],
                'body' => $body
            ]);

            return response()->json($blog);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);

            $this->removeBlogImages($blog->body);
            $blog->delete();

            return response()->json(['message' => 'Blog deleted successfully.']);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Handle Base64-encoded images in the HTML body.
     */
    private function handleBase64Images($body)
    {
        $pattern = '/<img src="data:image\/(png|jpg|jpeg|gif);base64,([^"]+)"/i';

        if (preg_match_all($pattern, $body, $matches)) {
            foreach ($matches[0] as $index => $match) {
                $extension = $matches[1][$index];
                $base64Image = $matches[2][$index];

                $imageData = base64_decode($base64Image);

                $fileName = uniqid() . '.' . $extension;
                $filePath = 'photos/' . $fileName;

                Storage::disk('public')->put($filePath, $imageData);

                $imageUrl = Storage::url($filePath);

                $body = str_replace($match, '<img src="' . $imageUrl . '"', $body);
            }
        }

        return $body;
    }

    /**
     * Optionally remove images from the blog body (used in the delete function if needed).
     */
    private function removeBlogImages($body)
    {
        $pattern = '/<img src="\/storage\/photos\/([^"]+)"/i';

        if (preg_match_all($pattern, $body, $matches)) {
            foreach ($matches[1] as $fileName) {
                Storage::disk('public')->delete('photos/' . $fileName);
            }
        }
    }
}
