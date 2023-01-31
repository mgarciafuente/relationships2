<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function show()
    {
        return view('user.show', ['users' => User::all()]);
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $name = $validated['name'];
        $lastname = $validated['lastname'];

        User::create(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('users'));
    }


    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        $name = $validated['name'];
        $lastname = $validated['lastname'];

        $user->update(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('users'));
        
    }


    public function delete(User $user)
    {
        $user->delete();

        return redirect(route('users'));
    }
}
