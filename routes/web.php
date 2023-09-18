<?php

use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologyController;
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

// GUEST
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

//  ADMIN
Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    // projects
    Route::get('/progects/trash', [ProjectController::class, 'trash'])->name('projects.trash'); //trash
    Route::patch('/progects/trash/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore'); //restore
    Route::delete('/progects/trash/{project}/drop', [ProjectController::class, 'drop'])->name('projects.drop'); //drop

    Route::resource('projects', ProjectController::class);

    // technologies
    Route::get('/technologies/trash', [TechnologyController::class, 'trash'])->name('technologies.trash'); //trash
    Route::patch('/technologies/trash/{technology}/restore', [TechnologyController::class, 'restore'])->name('technologies.restore'); //restore
    Route::delete('/technologies/trash/{technology}/drop', [TechnologyController::class, 'drop'])->name('technologies.drop'); //drop

    Route::resource('technologies', TechnologyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
