<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\API\AdminAuthController;
use App\Http\Controllers\API\CaseStudyController;

// Route::apiResource('posts', PostController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!'], 200);
});

Route::get('/showList', [PostController::class, 'getList']);

Route::post('/store', [PostController::class, 'store']);
Route::get('/show', [PostController::class, 'show']);

Route::prefix('admin')->group(function () {

    Route::post('/login', [AdminAuthController::class, 'login']);
    // Route::post('/forgot-password', [AdminAuthController::class, 'forgotPassword']);

    Route::middleware('admin.auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout']);

        // Example protected route
        Route::get('/dashboard', function () {
            return response()->json([
                'message' => 'Welcome Admin'
            ]);
        });
    });
});


Route::get('/case-studies', [CaseStudyController::class, 'index']);
Route::get('/case-studies/{slug}', [CaseStudyController::class, 'show']);


Route::middleware('admin.auth')->group(function () {

    Route::post('/case-studies', [CaseStudyController::class, 'store']);
    Route::post('/case-studies/update/{id}', [CaseStudyController::class, 'update']);
    Route::post('/case-studies/destroy/{id}', [CaseStudyController::class, 'destroy']);
    Route::post('/case-studies/restore/{id}', [CaseStudyController::class, 'restore']);
});