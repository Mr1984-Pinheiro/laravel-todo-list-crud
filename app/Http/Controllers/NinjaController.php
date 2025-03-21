<?php

namespace App\Http\Controllers;

use App\Models\Dojo;
use App\Models\Ninja;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    public function index()
    {

        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

        return view('ninjas.index', ["greenting" => "hello", "ninjas" => $ninjas]);
    }

    public function show($id)
    {

        $ninja = Ninja::with('dojo')->findOrfail($id);

        return view('ninjas.show', ["ninja" => $ninja]);
    }

    public function create()
    {
        $dojos = Dojo::orderBy('name', 'asc')->get();

        return view('ninjas.create', ['dojos' => $dojos]);
    }

    public function store(Request $request) 
    {
        $validated = $request->validate(([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]));

        Ninja::create($validated);

        return redirect()->route('ninjas.index')->with('success', 'Ninja Created!');
    }

    public function destroy($id)
    {
        $ninja = Ninja::findOrFail($id);
        $ninja->delete();

        return redirect()->route('ninjas.index')->with('success', 'Ninja Deleted!');
    }
}
