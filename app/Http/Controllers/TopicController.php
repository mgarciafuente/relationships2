<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Post;
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
        $allPosts = Post::all();
        $allUsedTopics = [];

        foreach($allPosts as $post) {
            foreach($post->topics()->get() as $usedTopic) {
                array_push($allUsedTopics, $usedTopic->id);
            }
        }

        if(!in_array($topic->id, $allUsedTopics)) {
            $topic->forceDelete();
        }
        
        return redirect(route('topics'));
    }
}
