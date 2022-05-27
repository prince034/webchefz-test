<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/')->name('admin.')->group(function () {
    Route::get('', function () {
        return redirect()->route('admin.login');
    });
    Route::view('login', 'admin.auth.login')->name('login');
    Route::post('login', [\App\Http\Controllers\AdminLoginController::class, 'checkLogin'])->name('checklogin');
    Route::match(['get', 'post'], '/logout', function () {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('home', 'admin.home')->name('home');
        Route::resources(['companies' => CompanyController::class,
                          'employees' => EmployeeController::class]);
    });
});
