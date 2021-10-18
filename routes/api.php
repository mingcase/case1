<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('userlist', [UserController::class, 'userList']);

Route::post('login', [ApiLoginController::class, 'login']);
Route::get('department_list', [DepartmentsController::class, 'departmentsList']);
Route::get('branch_list', [BranchesController::class, 'branchesList']);
Route::middleware('auth:api')->group(function () {

        Route::get('/me', function() {
           return Auth::user();
        });

    Route::get('feeds', [FeedController::class, 'feedList']);
    Route::get('feeds/{id}', [FeedController::class, 'feedDetail'])->where('id', '[0-9]+');
    Route::get('comment/{id}', [CommentsController::class, 'commentDetail'])->where('id', '[0-9]+');
    Route::post('comment', [CommentsController::class, 'commentAdd']);

});
