<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// User Management
Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'userView'])->name('user.view');
    Route::get('/add', [UserController::class, 'userAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'userStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
});
// Profile and password Management
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit/', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/update/', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/password/view/', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update/', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});
// Setup Management
Route::prefix('setup')->group(function () {
    Route::get('/student/class/view', [StudentClassController::class, 'studentClassView'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'studentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'studentClassStore'])->name('student.class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('student.class.update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');

    // Student Year routes
    Route::get('/student/year/view', [StudentYearController::class, 'studentYearView'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'studentYearAdd'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'studentYearStore'])->name('student.year.store');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'studentYearEdit'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'studentYearUpdate'])->name('student.year.update');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'studentYearDelete'])->name('student.year.delete');

    // Student group routes
    Route::get('/student/group/view', [StudentGroupController::class, 'studentGroupView'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class, 'studentGroupAdd'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'studentGroupStore'])->name('student.group.store');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'studentGroupEdit'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'studentGroupUpdate'])->name('student.group.update');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'studentGroupDelete'])->name('student.group.delete');

// Student Shift routes
    Route::get('/student/shift/view', [StudentShiftController::class, 'studentShiftView'])->name('student.shift.view');
    Route::get('/student/shift/add', [StudentShiftController::class, 'studentShiftAdd'])->name('student.shift.add');
    Route::post('/student/shift/store', [StudentShiftController::class, 'studentShiftStore'])->name('student.shift.store');
    Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'studentShiftEdit'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'studentShiftUpdate'])->name('student.shift.update');
    Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'studentShiftDelete'])->name('student.shift.delete');

// Fee Category routes
    Route::get('/fee/category/view', [FeeCategoryController::class, 'feeCategoryView'])->name('fee.category.view');
    Route::get('/fee/category/add', [FeeCategoryController::class, 'feeCategoryAdd'])->name('fee.category.add');
    Route::post('/fee/category/store', [FeeCategoryController::class, 'feeCategoryStore'])->name('fee.category.store');
    Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'feeCategoryEdit'])->name('fee.category.edit');
    Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'feeCategoryUpdate'])->name('fee.category.update');
    Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'feeCategoryDelete'])->name('fee.category.delete');

// Fee Amount routes
    Route::get('/fee/amount/view', [FeeAmountController::class, 'feeAmountView'])->name('fee.amount.view');
    Route::get('/fee/amount/add', [FeeAmountController::class, 'feeAmountAdd'])->name('fee.amount.add');
    Route::post('/fee/amount/store', [FeeAmountController::class, 'feeAmountStore'])->name('fee.amount.store');
    Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'feeAmountEdit'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'feeAmountUpdate'])->name('fee.amount.update');

});
