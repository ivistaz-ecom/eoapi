<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ChapterController;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/addmember', [MemberController::class, 'create'])->name('addmember');
    Route::get('/show-member/{id}', [MemberController::class, 'show'])->name('show-member');
    Route::get('/edit-member/{id}', [MemberController::class, 'edit'])->name('edit-member');
    Route::post('/update-member', [MemberController::class, 'update'])->name('update-member');
    Route::get('add-member', [MemberController::class, 'create'])->name('add-member');
    Route::post('save-data', [MemberController::class, 'store'])->name('save-data');
    Route::get('delete-member/{id}', [MemberController::class, 'destroy'])->name('delete-member');

    Route::get('chapters', [ChapterController::class, 'index'])->name('chapters');
    Route::get('show-chapter/{id}', [ChapterController::class, 'show'])->name('show-chapter');
    Route::get('edit-chapter/{id}', [ChapterController::class, 'edit'])->name('edit-chapter');
    Route::post('delete-chapter/{id}', [ChapterController::class, 'destroy'])->name('delete-chapter');
    Route::post('update-chapter', [ChapterController::class, 'update'])->name('update-chapter');
    Route::post('create-chapter', [ChapterController::class, 'store'])->name('create-chapter');
    Route::get('add-chapter', [ChapterController::class, 'create'])->name('add-chapter');
});