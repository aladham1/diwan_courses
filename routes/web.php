<?php

use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EvaluatedAction;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GetEvaluationAction;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestedCourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StoreEvaluationAction;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainerCategoryController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\Website\CoursesController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\Website\UserController as WebsiteUser;
use Illuminate\Support\Facades\Route;


//Route::get('/', [HomePageController::class, 'index'])->name('index');\

Route::get('loginTest', function (){
    return "Hiaaa";
});
Route::get('logoutTest', function (){
    return "Hi";
});
Route::get('logoutTest', function (){
    return "Hi";
});

Route::get('payment-error', [SubscriptionController::class, 'paymentError'])
    ->name('paymentError');
Route::get('courses/details/{id}', [CourseController::class, 'details']);

Route::post('/forgot-password', [UserController::class, 'forgetPassword'])
    ->middleware('guest');



Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::middleware(['IsAdmin'])->group(function () {

//        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/pages/{page}', [SettingController::class, 'pages'])->name('settings.pages');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::resource('roles', RoleController::class)->except('show', 'edit');
        Route::get('get-roles', [RoleController::class, 'getRoles']);
        Route::get('get-abilities', [RoleController::class, 'getAbilities']);

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('get-users', [UserController::class, 'getUsers']);
        Route::post('users', [UserController::class, 'store']);

//        Route::post('users', [UserController::class, 'store']);
//        Route::post('restore-user/{id}', [UserController::class, 'restoreUser']);
       Route::delete('users/{user}', [UserController::class, 'destroy']);
        Route::put('users/{user}', [UserController::class, 'update']);
//        Route::get('users', [UserController::class, 'index'])->name('users.index');
//        Route::get('get-users', [UserController::class, 'getUsers']);
//        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('my-account', [UserController::class, 'myAccount'])->name('my_account');
        Route::put('my-account', [UserController::class, 'updateMyAccount']);

        Route::resource('courses', CourseController::class);
        Route::get('get-courses', [CourseController::class, 'getCourses']);
        Route::get('course/{course}', GetEvaluationAction::class);
        Route::post('course', StoreEvaluationAction::class)->name('evaluation.store');
    });

});
//Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth.sso'])->group(function () {
//    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

});

require __DIR__ . '/auth.php';

