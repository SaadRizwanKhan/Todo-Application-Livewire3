<div>
    
    
@error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror

<h1 class="text-center mt-5">Plan Your Day, the Efficient Way!</h1>

<section class="container" id="section-01">
@if($todoEdit)
    <form wire:submit="updateTodo('{{ $todoID }}')" class="grid gafc cgap-2">
        @csrf
        <input type="text" wire:model="title" class="form-control" placeholder="Title" required>
        <input type="text" wire:model="description" class="form-control" placeholder="Description" required>
        <button type="submit" class="btn btn-default btn-success">Update</button>
    </form>
    
@else
    <form wire:submit="store" class="grid gafc cgap-2">
        @csrf
        <input type="text" wire:model="title" class="form-control" placeholder="Title" required>
        <input type="text" wire:model="description" class="form-control" placeholder="Description" required>
        <button type="submit" class="btn btn-default btn-success">Add</button>
    </form>
 @endif   
    
</section>
 

<section class="container mt-5" id="section-02">
    @foreach ($allTodos as $todo)
    <div wire:key="{{ $todo->id }}" class="grid shadow p-3 bround-3">
        <div class="grid gafc jcsb jisb">
            <h5 class="{{ $todo->completed=='1' ? 'text-decoration-line-through' : '' }}">{{ $todo->title }}</h5>
            <div class="grid gtc-3 cgap-1">
                <button  wire:click="editModal('{{ $todo->id}}','{{ $todo->title}}','{{ $todo->description}}')" class="btn" type="button" class="btn btn-primary" {{ $todo->completed=='1' ? 'disabled' : '' }} ><i class="fa-solid fa-pen-to-square fa-lg"
                        style="color: #43aa8b;"></i></button>
                <button wire:click="deleteTodo('{{ $todo->id }}')" class="btn" type="button" ><i class="fa-solid fa-trash-can fa-lg"
                        style="color: #d81159;"></i></button>
                <button wire:click="markTodo('{{ $todo->id }}')" class="btn" type="button" {{ $todo->completed=='1' ? 'disabled' : '' }}><i class="fa-solid fa-circle-check fa-lg"
                        style="color: #008000;"></i></button>
            </div>

        </div>
        <div class="grid {{ $todo->completed=='1' ? 'text-decoration-line-through' : '' }}">
            {{ $todo->description }}
        </div>
    </div>
    @endforeach
</section>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


 
</div>
