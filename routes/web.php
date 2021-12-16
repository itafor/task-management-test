<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [TaskController::class,'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'storeTask'])->name('task.store');
Route::get('/task/edit/{task}', [TaskController::class,'editTask'])->name('task.edit');
Route::get('/task/delete/{task}', [TaskController::class,'deleteTask'])->name('task.delete');
Route::post('/task/update', [TaskController::class, 'updateTask'])->name('task.update');
Route::post('/sort-tasks', [TaskController::class, 'updateSortedTasks'])->name('update.sorted.tasks');

Route::get('/project/create', [TaskController::class, 'createProject'])->name('project.create');
Route::post('/project/store', [TaskController::class, 'storeProject'])->name('project.store');
Route::get('/project/view/{project}', [TaskController::class, 'viewTaskByProject'])->name('project.view');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


