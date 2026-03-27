<?php

use App\Http\Controllers\UserActionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/all-users', function () {
    $users = User::orderBy('balance', 'desc')->take(20)->get();
    return view('user', compact('users'));
});

Route::get('/matka-game-plays/{email}', [UserActionController::class, 'matkaPlays']);
Route::get('/thai-game-plays/{email}', [UserActionController::class, 'thaiPlays']);

Route::post('/plays/update-number', [UserActionController::class, 'updateNumber'])->name('plays.updateNumber');