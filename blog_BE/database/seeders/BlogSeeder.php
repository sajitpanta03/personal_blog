<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = Storage::url('blogsImage/sessionCodeShot.png');

        $blogs = [
            [
                'title' => 'Sample Blog 1',
                'body' => '<h1>Blog 1 Title</h1><p>This is the content of blog 1.</p><img src="' . $imagePath .'" alt="Image 1">',
            ],
            [
                'title' => 'Sample Blog 2',
                'body' => '<h1>Blog 1 Title</h1><p>This is the content of blog 1.</p><img src="' . $imagePath .'" alt="Image 1">',
            ],
            [
                'title' => 'Sample Blog 3',
                'body' => '<h1>Blog 1 Title</h1><p>This is the content of blog 1.</p><img src="' . $imagePath .'" alt="Image 1">',
            ],
        ];

        // Insert data into the Blog model
        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
