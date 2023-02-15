<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('post.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('post.create', ['users' => User::all(), 'topics' => Topic::all()]);
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $title = $validated['title'];
        $text = $validated['text'];
        $user = User::find($validated['user']);
        $topics = $validated['topics'];

        $post = $user->posts()->create(['title' => $title, 'text' => $text]);
        $post->topics()->attach($topics);

        return redirect(route('posts'));
    }

    public function edit(Post $post)
    {
        $users = User::all();
        $topics = Topic::all();
        $currentTopics = [];
        foreach($post->topics as $topic) {
            array_push($currentTopics, $topic->id);
        }
        return view('post.edit', compact('post', 'users', 'topics', 'currentTopics'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $title = $validated['title'];
        $text = $validated['text'];
        $user = User::find($validated['user']);
        $topics = $request['topics'];

        $post->update(compact('title', 'text'));
        $post->topics()->sync($topics);
        $user->posts()->save($post);

        return redirect(route('posts'));
    }

    public function destroy(Post $post)
    {
        $post->topics()->detach();
        $post->forceDelete();

        return redirect(route('posts'));
    }
}
