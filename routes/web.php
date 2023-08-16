<?php

use App\Http\Controllers\TasksController;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', HomePage::class);
Route::controller(TasksController::class)->group(function(){
    Route::post('todo', 'store')->name('storeTodo');
    Route::get('todo/create', 'create');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::get('/todo/delete/{id}', 'destroy');
    Route::get('todo/edit/{id}', 'edit');

});



 