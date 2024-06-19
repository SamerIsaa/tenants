<?php

use App\Http\Controllers\Media\FileController;
use App\Http\Controllers\Media\ImageController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Media\ImageHandler;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(12);
    return view('welcome');
});

Route::get('test' , function (){

    App\Models\Tenant::all()->runForEach(function () {
        App\Models\User::factory()->count(20)->create();
    });


});

//  general media routes

Route::get('images/{path}/{size?}', [MediaController::class, 'getPhoto']);

Route::prefix('/image')->group(function () {
    Route::get('/upload', [ImageController::class, 'upload_image'])->name('upload.image');
    Route::get('/delete', [ImageController::class, 'delete_image'])->name('delete.image');
    Route::get('/{size}/{id}', [ImageHandler::class, 'getPublicImage'])->name('size.image');
    Route::get('/limit/{size}/{id}', [ImageHandler::class, 'getDefaultImage'])->name('limit.image');
    Route::get('/{id}', [ImageHandler::class, 'getDefaultImage'])->name('image');
});

Route::prefix('/file')->group(function () {
    Route::get('/{file}', [FileController::class, 'show'])->name('file.show');
    Route::get('/uploadFile', [FileController::class, 'upload_file'])->name('upload.file');
    Route::get('/delete', [FileController::class, 'delete_file'])->name('delete.file');
});

