<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/model/{id}', [ModelController::class, 'detail'])->name('model.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-model', [ModelController::class, 'add'])->name('model.add');
    Route::post('/add-model', [ModelController::class, 'create'])->name('model.create');

    Route::get('/download-model/{id}', [ModelController::class, 'download'])->name('model.download');
});

require __DIR__.'/auth.php';
