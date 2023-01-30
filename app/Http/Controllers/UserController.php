<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required'
        ]);

        $name = $request->input('name');
        $lastname = $request->input('lastname');

        User::create(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('users'));
    }


    public function edit(User $id)
    {
        return view('user.edit', ['user' => $id]);
    }

    public function update(Request $request, User $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required'
        ]);

        $name = $request->input('name');
        $lastname = $request->input('lastname');

        $id->update(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('users'));
    }


    public function delete(User $id)
    {
        $id->delete();

        return redirect(route('users'));
    }
}
