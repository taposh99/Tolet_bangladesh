<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomSpaceController;
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



Route::get('/', [DashboardController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/create/bed/space', [BedController::class, 'create'])->name('create.bed.space');
    Route::get('/create/bed/index', [BedController::class, 'index'])->name('create.bed.index');
    Route::post('bed/space/store', [BedController::class, 'store'])->name('bed.space.store');

    Route::get('bed/space/edit/{id}', [BedController::class, 'edit'])->name('bed.space.edit');
    Route::post('bed/space/update', [BedController::class, 'update'])->name('bed.space.update');
    Route::delete('bed/space/delete', [BedController::class, 'destroy'])->name('bed.space.delete');


    //room space
    Route::get('/create/room/space', [RoomSpaceController::class, 'create'])->name('create.room.space');
    Route::get('/room/space/index', [RoomSpaceController::class, 'index'])->name('room.space.index');
    Route::post('room/space/store', [RoomSpaceController::class, 'store'])->name('room.space.store');

    Route::get('room/space/edit/{id}', [RoomSpaceController::class, 'edit'])->name('room.space.edit');
    Route::post('room/space/update', [RoomSpaceController::class, 'update'])->name('room.space.update');
    Route::delete('room/space/delete', [RoomSpaceController::class, 'destroy'])->name('room.space.delete');


    //flat
    Route::get('/create/flat', [FlatController::class, 'create'])->name('create.flat');
    Route::get('/flat/index', [FlatController::class, 'index'])->name('flat.index');
    Route::post('flat/store', [FlatController::class, 'store'])->name('flat.store');

    Route::get('flat/space/edit/{id}', [FlatController::class, 'edit'])->name('flat.space.edit');
    Route::post('flat/space/update', [FlatController::class, 'update'])->name('flat.space.update');
    Route::delete('flat/space/delete', [FlatController::class, 'destroy'])->name('flat.space.delete');
});
