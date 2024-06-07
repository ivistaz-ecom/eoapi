<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ChapterController;
use App\Http\Controllers\Backend\OfferPackagesController;
use App\Http\Controllers\Backend\PaymentInfoController;
use App\Http\Controllers\Backend\RegCountController;
use App\Http\Controllers\Backend\RieRegistrationController;

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

    Route::get('offers', [OfferPackagesController::class, 'index'])->name('offers');
    Route::get('show-offer/{id}', [OfferPackagesController::class, 'show'])->name('show-offer');
    Route::get('add-offer', [OfferPackagesController::class, 'create'])->name('add-offer');
    Route::post('save-offer', [OfferPackagesController::class, 'store'])->name('save-offer');
    Route::get('edit-offer/{id}', [OfferPackagesController::class, 'edit'])->name('edit-offer');
    Route::post('update-offer', [OfferPackagesController::class, 'update'])->name('update-offer');
    Route::get('delete-offer/{id}', [OfferPackagesController::class, 'destroy'])->name('delete-offer');

    Route::get('payments', [PaymentInfoController::class, 'index'])->name('payments');
    Route::get('payment-detail/{id}', [PaymentInfoController::class, 'show'])->name('payment-detail');
    Route::post('delete-payment/{id}', [PaymentInfoController::class, 'destroy'])->name('delete-payment');

    Route::get('registration-count', [RegCountController::class, 'index'])->name('registration-count');
    Route::get('show-regcount/{id}', [RegCountController::class, 'show'])->name('show-regcount');
    Route::get('edit-regcount/{id}', [RegCountController::class, 'edit'])->name('edit-regcount');
    Route::post('update-regcount', [RegCountController::class, 'update'])->name('update-regcount');
    Route::get('delete-regcount/{id}', [RegCountController::class, 'delete'])->name('delete-regcount');

    Route::get('rie-members', [RieRegistrationController::class, 'index'])->name('rie-members');
    Route::get('rie-member/{id}', [RieRegistrationController::class, 'show'])->name('rie-member');
});