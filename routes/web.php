<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MembersController;


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

Route::get('/', [InfoController::class, 'home'])->name('home');
Route::get('/notes', [InfoController::class, 'notes'])->name('notes');

Route::prefix('members')->group(function () {
    Route::get('/', [MembersController::class, 'index'])
        ->name('list_schools');

    Route::get('{school_id}', [MembersController::class, 'show'])
        ->whereNumber('school_id')
        ->name('list_members');

    Route::get('new', [MembersController::class, 'create'])
        ->name('create_member');

    Route::post('new', [MembersController::class, 'store'])
        ->name('store_member');
});
