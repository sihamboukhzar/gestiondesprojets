<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\rapportController;
use App\Http\Controllers\TachesController;
use App\Http\Controllers\ChartController;
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

Route::get('/auth/register', function () {
    return view('/auth/register');
})->middleware(['auth'])->name('register');


Route::get('/dashboard', function () {
    return view('/dashboard/dashboard');
})->middleware(['auth'])->name('register');

require __DIR__.'/auth.php';

Route::get('/dashboard/tables', function () {
    return view('/dashboard/tables');
});

Route::get('/dashboard/charts', function () {
    return view('/dashboard/charts');
});
Route::get('/dashboard/ajouter', function () {
    return view('/dashboard/ajouter');
});
Route::get('/dashboard/main', function () {
    return view('/dashboard/main');
});

Route::get('/dashboard/details', function () {
    return view('/dashboard/details');
});
Route::resource("/Project", ProjectController::class);
Route::resource("/material", materialController::class);
Route::resource("/Equipe", EquipesController::class);
Route::resource("dashboard/main", rapportController::class);
Route::resource("dashboard/charts", ChartController::class);


Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
  
    Route::resource("/Tache", TachesController::class);
});