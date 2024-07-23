<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Story;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
//        Story::create([
//            'title'       => 'NEWS',
//            'content'     => 'hooy sasi',
//            'author_id'   => 1,
//            'views_count' => 0,
//            'is_hidden'   => false,
//            'image_path'  => 'path/image.jpg',
//        ]);
        $firstAuthor = Author::first();

        $news = new Story();

        $news->title = 'NEWS';
        $news->content = 'hooy sasi';
        $news->is_hidden = false;
        $news->image_path = 'path/image.jpg';

        $news->author()->associate($firstAuthor);
        $news->save();
    }
}
