<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Author;
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

Route::group([ 'as' => 'admin.',
               'prefix' => 'admin',
               'namespace' => 'Admin',
               'middleware' => ['auth', 'admin']],
  #middleware = auth, admin to check whether user is login or not and check if the user is an admin or not
function() {
  Route::get('dashboard', 'AdminDashboardController@index') -> name('dashboard');
});

Route::group([ 'as' => 'author.',
               'prefix' => 'author',
               'namespace' => 'Author',
               'middleware' => ['auth', 'author']],
  #middleware = auth, admin to check whether user is login or not and check if the user is an authir or not
function() {
  Route::get('dashboard', 'AuthorDashboardController@index') -> name('dashboard');
});
