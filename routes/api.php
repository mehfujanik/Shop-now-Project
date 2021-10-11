<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\IndexController;

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


// for user registration
Route::post('/register', [AuthController::class, 'register']);
// for user login
Route::post('/login', [AuthController::class, 'login']);

//for authenticate user can access those route
Route::middleware('auth:sanctum')->group(function () {
	
	// User Logout Route
	Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

	// User Profile Update
	Route::get('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');

	// User Profile Update
	Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

	// User Change password
	Route::get('/user/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');

	// user password chnage
	Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');



});
