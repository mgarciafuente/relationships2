<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectionRequest;
use App\Models\Direction;

class DirectionController extends Controller
{

    public function show()
    {
        return view('direction.show', ['direction' => Direction::all()]);
    }


    public function create()
    {
        return view('direction.create');
    }


    public function store(DirectionRequest $request)
    {
        $validated = $request->validated();

        $name = $validated['name'];
        $lastname = $validated['lastname'];

        Direction::create(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('direction'));
    }


    public function edit(Direction $direction)
    {
        return view('direction.edit', ['direction' => $direction]);
    }

    public function update(DirectionRequest $request, Direction $direction)
    {
        $validated = $request->validated();

        $name = $validated['name'];
        $lastname = $validated['lastname'];

        $direction->update(['name' => $name, 'lastname' => $lastname]);

        return redirect(route('direction'));
        
    }


    public function delete(Direction $direction)
    {
        $direction->delete();

        return redirect(route('direction'));
    }
}
