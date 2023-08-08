<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GetEvaluationAction;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowEvaluationAction;
use App\Http\Controllers\StoreEvaluationAction;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth.sso'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class)->except('show', 'edit');
    Route::get('get-roles', [RoleController::class, 'getRoles']);
    Route::get('get-abilities', [RoleController::class, 'getAbilities']);
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('get-users', [UserController::class, 'getUsers']);
    Route::post('users', [UserController::class, 'store']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::get('my-account', [UserController::class, 'myAccount'])->name('my_account');
    Route::put('my-account', [UserController::class, 'updateMyAccount']);
    Route::resource('courses', CourseController::class);
    Route::get('get-courses', [CourseController::class, 'getCourses']);
    Route::get('course/{course}', GetEvaluationAction::class);
    Route::get('showEvaluate/{id}', ShowEvaluationAction::class)->name('evaluation.store');
    Route::post('course', StoreEvaluationAction::class)->name('evaluation.store');
});


require __DIR__ . '/auth.php';

