<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Models\Author;
use App\Models\Story;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class StoryController extends Controller
{
    public function index() : Response
    {
        $authors = Author::all();
        $stories = Story::all();

        return Inertia::render('Stories/StoriesIndex', [
            'authors' => $authors ?? [],
            'stories' => $stories ?? [],
        ]);
    }

    public function create() : Response
    {
        $authors = Author::all();

        return Inertia::render('Stories/StoriesCreate', [
            'authors' => $authors ?? [],
        ]);
    }

    public function store(StoreStoryRequest $request) : RedirectResponse
    {
        $validated = $request->validated(); // проверенные данные с которыми безопасно работать

        Story::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author_id' => $validated['author_id'],
            'image_path' => $validated['image_path'] ?? null,
        ]);

        return redirect()->route('stories.index');
    }
}
