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
        $topics = Topic::where('id', 'in', $validated['topic']);

        $post = $user->posts()->create(['title' => $title, 'text' => $text]);

        foreach($topics as $topic) {
            $post->topics()->attach($topic->id);
        }

        return redirect(route('posts'));
    }

    public function edit(Post $post)
    {
        $users = User::where('id', '!=', $post->user_id)->get();
        $current = $post->user()->first();
        return view('post.edit', compact('post', 'users', 'current'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $title = $validated['title'];
        $text = $validated['text'];
        $user = User::find($validated['user']);

        $post->update(compact('title', 'text'));
        $user->posts()->save($post);

        return redirect(route('posts'));
    }

    public function destroy(Post $post)
    {
        $post->forceDelete();

        return redirect(route('posts'));
    }
}
