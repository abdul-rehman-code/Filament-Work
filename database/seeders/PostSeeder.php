<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'FBR Updates 2025-26',
            'slug' => Str::slug('FBR Updates 2025-26'),
            'content' => 'Read the latest deep dives into FBR strategy. Learn legal avoidance protocols, VPS shielding, and more.',
        ]);
    }
}
