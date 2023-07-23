<?php

use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestedCourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TrainerCategoryController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\Website\CoursesController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\Website\UserController as WebsiteUser;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomePageController::class, 'index'])->name('index');



//if (!strpos(Request::url(), "manage") && !strpos(Request::url(), "payment-error") &&
//    !strpos(Request::url(), "payment-call-back") && !strpos(Request::url(), "reset-password")
//    && !strpos(Request::url(), "details")) {
//    Route::get('/{vue_capture?}', function () {
//        return view('index');
//    })->where('vue_capture', '[\/\w\.-]*');
//}
Route::get('payment-call-back', [SubscriptionController::class, 'paymentCallBack'])
    ->name('paymentCallBack');
Route::get('payment-error', [SubscriptionController::class, 'paymentError'])
    ->name('paymentError');
Route::get('courses/details/{id}', [CourseController::class, 'details']);

Route::post('/forgot-password', [UserController::class, 'forgetPassword'])
    ->middleware('guest');

Route::post('coupons', [SubscriptionController::class, 'checkCoupon']);
Route::post('subscription', [SubscriptionController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::put('users', [WebsiteUser::class, 'update']);
    Route::middleware(['IsAdmin'])->prefix('manage')->group(function () {

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
//        Route::delete('users/{id}', [UserController::class, 'destroy']);
//        Route::put('users/{user}', [UserController::class, 'update']);
//        Route::get('users', [UserController::class, 'index'])->name('users.index');
//        Route::get('get-users', [UserController::class, 'getUsers']);
//        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('my-account', [UserController::class, 'myAccount'])->name('my_account');
        Route::put('my-account', [UserController::class, 'updateMyAccount']);

        Route::resource('units', UnitController::class)->except('show', 'edit');
        Route::post('units-restore/{id}', [UnitController::class, 'restore']);
        Route::get('get-units', [UnitController::class, 'getUnits']);


        Route::post('storeImage', [SliderController::class, 'storeImage']);
        Route::get('get-workshops', [WorkshopController::class, 'getWorkshops'])->name('getWorkshops');

        Route::get('iterated-courses', [InterestedCourseController::class, 'index'])->name('iterated.index');
        Route::get('get-interested-courses', [InterestedCourseController::class, 'getInterested']);
        Route::delete('iterated-courses/{id}', [InterestedCourseController::class, 'destroy']);

        Route::resource('expenses-categories', ExpenseCategoryController::class)->except('show',
            'edit', 'create');
        Route::post('expenses-categories-restore/{id}', [ExpenseCategoryController::class, 'restore']);
        Route::get('get-expenses-categories', [ExpenseCategoryController::class, 'getCategories']);
        Route::get('get-expenses-categories-child/{id}', [ExpenseCategoryController::class, 'getCategoryChild']);



    });

});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

});

require __DIR__ . '/auth.php';

