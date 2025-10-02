<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'post 1',
            'description' => 'lorem ipsum 1',
            'published_at' => now(),
            'tag_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'post 2',
            'description' => 'lorem ipsum 2',
            'published_at' => '2025-05-15',
            'tag_id' => 2,
            'category_id' => 2,
        ]);
    }
}
