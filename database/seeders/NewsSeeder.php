<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\News;
use App\Models\Author;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'NEWS',
            'content' => 'hooy sasi',
            'author_id' => 1,
            'views_count' => 0,
            'is_hidden' => false,
            'image_path' => 'path/image.jpg',
        ]);
    }
}
