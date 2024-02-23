<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\studentcontroller;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    try {
        $user = Socialite::driver('github')->user();

    } catch (\Exception $e) {

        dd($e);

    }
    // $user->token
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
