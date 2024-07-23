<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class StoryController extends Controller
{
    public function index()
    {
//        Author::create([
//            'name'      => 'Evginy',
//            'lastname'  => 'Sosa',
//            'bio'       => 'donie',
//            'is_active' => false,
//        ]);
//
//        $authors = Author::with('stories')->get();

//        $stories = Story::with('author')->get();

//        dd($authors);

        return Inertia::render('StoriesIndex', [
            'authors' => $authors ?? [],
            'stories' => $stories ?? [],
        ]);
    }
}
