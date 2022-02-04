<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\PillarController;
use App\Http\Controllers\MapDataController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\KeyActionControler;
use App\Http\Controllers\AsignRoleController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllMapedDataController;

/*
|--------------------------------------------------------------------------
| Web Routesclea
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('matrix', MatrixController::class);
    Route::resource('members', MembersController::class);
    Route::resource('pillars', PillarController::class);
    Route::resource('keyaction', KeyActionControler::class);
    Route::resource('roles',RolesController::class);
    Route::resource('asign-role',AsignRoleController::class);
    Route::post('permission',[PermissionController::class, 'store'])->name('permission.store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('countries', CountriesController::class);
    Route::resource('map-data', MapDataController::class);
    Route::get('/all-mapped-data', [AllMapedDataController::class, "index"])->name("all-mapped-data.index");

    Route::get('by-country/{ke}/', [CountriesController::class,'symbol'])->name("by-country");

});

