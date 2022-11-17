<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\EmployeeController;
use Illuminate\Http\Request;
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

Route::post("user/signup", [UserController::class, "signup"]);
Route::post("user/login", [UserController::class, "login"]);
Route::put("user/update", [UserController::class, "updateInfo"]);

Route::middleware(['auth:api'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});