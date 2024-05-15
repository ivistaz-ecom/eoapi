<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\ChapterController;
use App\Http\Controllers\API\RegionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('eomembers', MemberController::class);
Route::patch('/eomembers/{id}', [MemberController::class, 'update']);
Route::apiResource('chapters', ChapterController::class);
Route::apiResource('regions', RegionController::class);