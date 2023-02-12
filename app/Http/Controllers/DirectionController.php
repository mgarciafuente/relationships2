<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectionRequest;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\User;

class DirectionController extends Controller
{

    public function index()
    {
        return view('direction.index', ['directions' => Direction::all()]);
    }


    public function create()
    {
        $assignedUsers = Direction::where('user_id', '!=', null)->get('user_id');
        $notAssignedUsers = User::whereNotIn('id', $assignedUsers)->get();

        return view('direction.create', ['users' => $notAssignedUsers]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'street' => 'required',
            'number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'user' => 'required'
        ]);
    

        $street = $validatedData['street'];
        $number = $validatedData['number'];
        $postal_code = $validatedData['postal_code'];
        $city = $validatedData['city'];
        $user = User::find($validatedData['user']);

        $user->direction()->create(['street' => $street, 'number' => $number, 'postal_code' => $postal_code, 'city' => $city]);
    
        return redirect(route('directions'));
    }


    public function edit(Direction $direction)
    {
        $assignedUsers = Direction::where('user_id', '!=', null)->where('deleted_at', '=', null)->get('user_id');
        $users = User::whereNotIn('id', $assignedUsers)->get();
        $current = $direction->user()->first();

        return view('direction.edit', compact('direction', 'users', 'current'));
    }

    public function update(DirectionRequest $request, Direction $direction)
    {
        $validated = $request->validated();

        $street = $validated['street'];
        $number = $validated['number'];
        $postal_code = $validated['postal_code'];
        $city = $validated['city'];
        $user = User::find($request['user']);

        $direction->update(['street' => $street, 'number' => $number, 'postal_code' => $postal_code, 'city' => $city]);
        $user->direction()->save($direction);

        return redirect(route('directions'));
        
    }


    public function destroy(Direction $direction)
    {
        $direction->forceDelete();

        return redirect(route('directions'));
    }
}
