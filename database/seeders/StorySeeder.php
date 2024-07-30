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

        $news->title = 'NEWS_1';
        $news->content = 'hooy sasi';
        $news->is_hidden = false;
        $news->image_path = 'path/image.jpg';
        $news->author()->associate($firstAuthor);
        $news->save();

        $news2 = new Story();
        $news2->title = 'NEWS_2';
        $news2->content = 'black hole its your anus';
        $news2->is_hidden = false;
        $news2->image_path = 'path/image2.jpg';
        $news2->author()->associate($firstAuthor);
        $news2->save();

        $news3 = new Story();
        $news3->title = 'NEWS_3';
        $news3->content = 'im talking to cops quietly';
        $news3->is_hidden = false;
        $news3->image_path = 'path/image3.jpg';
        $news3->author()->associate($firstAuthor);
        $news3->save();
    }
}
