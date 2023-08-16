<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allTodos = Todos::all();
        return view('pages.home')->with("allTodos", $allTodos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
     

        $todo = new Todos();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        
        return redirect()->back()
        ->with('message' , 'Todo added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Todo = Todos::find($id);
        $Todo->delete();

        return redirect()->back()
        ->with('message' , 'Todo Deleted successfully');

    }
}
