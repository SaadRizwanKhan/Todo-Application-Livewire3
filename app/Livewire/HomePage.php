<?php

namespace App\Livewire;

use App\Models\Todos;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;
use Illuminate\Support\Facades\Session;
class HomePage extends Component
{

    public $isActive = false;

    public $allTodos = []; // Initialize with your task data
    public $todoID = '';

    public $title='';
    public $description='';
    public $todoEdit=false;
    public $selectedId; // New property to hold the selected ID
    public function render()
    {
        $this->allTodos = Todos::orderBy('created_at', 'desc')->get();
        return view('livewire.home-page');
    }

    public function store()
    {        
        //validate the data
        $this->validateData();
        //create
        Todos::create($this->only(['title','description']));
        $this->resetform();
    }

    public function deleteTodo($id)
    {
        $Todo = Todos::find($id);
        $Todo->delete();
    }
   
    public function markTodo($id)
    {
        $Todo = Todos::find($id);
        $Todo->completed = "1";
        $Todo->save();
    }
    public function editModal($id,$title, $description)
    {    
        //make this true to display the update form and hide the add form
        $this->todoEdit = true;
        //to populate the form
        $this->todoID = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function updateTodo($id){
        //validate the data
        $this->validateData();

        //find the todo to update
        $Todo = Todos::find($id);
        $Todo->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $this->todoEdit=false;
        $this->resetform();
    }

    //reset todo
    public function resetform(){
        $this->title = '';
        $this->description = '';
    }

    public function validateData(){
        $validated = $this->validate([ 
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
    }

    //method to toggle class
    public function toggleClass()
    {
        $this->isActive = !$this->isActive;
    }
    
    
}
