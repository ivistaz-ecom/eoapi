<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\ChapterController;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RieMemberController;
use App\Http\Controllers\API\MemberPrefController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Route::middleware('auth:sanctum')->prefix('eoglobal')->group(function () {
    Route::apiResource('eomembers', MemberController::class);
    Route::apiResource('chapters', ChapterController::class);
    Route::apiResource('regions', RegionController::class);
    Route::apiResource('rie-member', RieMemberController::class);
    Route::apiResource('member-preference', MemberPrefController::class);
//});
