<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ContentController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\FrontendController;

//frontend
Route::get('/', [FrontendController::class, 'index']);


//backend controllers
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


        //course
        Route::prefix('course')
            ->controller(CourseController::class)
            ->group(function () {
                Route::get('/', 'index')->name('course.index');
                Route::get('/create', 'create')->name('course.create');
                Route::post('/', 'store')->name('course.store');
                Route::get('/{course}/edit', 'edit')->name('course.edit');
                Route::put('/{course}', 'update')->name('course.update');
                Route::delete('/{course}', 'destroy')->name('course.destroy');
            });

        //module
        Route::prefix('module')
            ->controller(ModuleController::class)
            ->group(function () {
                Route::get('/', 'index')->name('module.index');
                Route::get('/create', 'create')->name('module.create');
                Route::post('/', 'store')->name('module.store');
                Route::get('/{module}/edit', 'edit')->name('module.edit');
                Route::put('/{module}', 'update')->name('module.update');
                Route::delete('/{module}', 'destroy')->name('module.destroy');
            });
        //content
        Route::prefix('content')
            ->controller(ContentController::class)
            ->group(function () {
                Route::get('/', 'index')->name('content.index');
                Route::get('/create', 'create')->name('content.create');
                Route::post('/', 'store')->name('content.store');
                Route::get('/{content}/edit', 'edit')->name('content.edit');
                Route::put('/{content}', 'update')->name('content.update');
                Route::delete('/{content}', 'destroy')->name('content.destroy');

                Route::get('/{content}/show', 'show')->name('content.show');
            });
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
