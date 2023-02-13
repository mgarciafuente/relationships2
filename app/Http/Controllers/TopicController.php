<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return view('topic.index', ['topics' => Topic::all()]);
    }

    public function create()
    {
        return view('topic.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $title = $validated['title'];
        $text = $validated['text'];

        Topic::create(['title' => $title, 'text' => $text]);

        return redirect(route('topics'));
    }

    public function destroy(Topic $topic)
    {
        $topic->forceDelete();
        return redirect(route('topics'));
    }
}
