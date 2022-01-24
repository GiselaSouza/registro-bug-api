<?php

    use App\Http\Controllers\Profile\ProfileController;
    use App\Http\Controllers\ClassificationBug\ClassificationBugController;
    use App\Http\Controllers\Bug\BugController;
    use App\Http\Controllers\User\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("profile")->controller(ProfileController::class)->group(function() {
    Route::get("/", "index");
    Route::post("/", "store");
    Route::get("/{profile}", "show");
    Route::put("/{profile}", "update");
    Route::delete("/{profile}", "destroy");
});

Route::prefix("user")->controller(UserController::class)->group(function() {
    Route::get("/", "index");
    Route::post("/", "store");
    Route::get("/{user}", "show");
    Route::put("/{user}", "update");
    Route::delete("/{user}", "destroy");
});

Route::prefix("classification-bug")->controller(ClassificationBugController::class)->group(function() {
    Route::get("/", "index");
    Route::post("/", "store");
    Route::get("/{classificationBug}", "show");
    Route::put("/{classificationBug}", "update");
    Route::delete("/{classificationBug}", "destroy");
});

Route::prefix("bug")->controller(BugController::class)->group(function() {
    Route::get("/", "index");
    Route::post("/", "store");
    Route::get("/{bug}", "show");
    Route::put("/{bug}", "update");
    Route::delete("/{bug}", "destroy");
});
