<?php

use App\Http\Controllers\BedController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/create/bed/space', [BedController::class, 'create'])->name('create.bed.space');
    Route::get('/create/bed/index', [BedController::class, 'index'])->name('create.bed.index');
    Route::post('bed/space/store', [BedController::class, 'store'])->name('bed.space.store');

    Route::get('bed/space/edit/{id}', [BedController::class, 'edit'])->name('bed.space.edit');
    Route::post('bed/space/update', [BedController::class, 'update'])->name('bed.space.update');
    Route::delete('bed/space/delete', [BedController::class, 'destroy'])->name('bed.space.delete');
});
