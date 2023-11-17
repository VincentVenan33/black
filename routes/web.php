<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
        //about us
		Route::get('aboutus', ['as' => 'pages.aboutus', 'uses' => 'App\Http\Controllers\PageController@aboutus']);

        //pasien
		Route::get('pasien/view', ['as' => 'pages.viewpasien', 'uses' => 'App\Http\Controllers\PasienController@viewpasien']);
		Route::get('pasien/add', ['as' => 'pages.addpasien', 'uses' => 'App\Http\Controllers\PasienController@addpasien']);
		Route::post('pasien/save', ['as' => 'pages.savepasien', 'uses' => 'App\Http\Controllers\PasienController@savepasien']);
		Route::get('pasien/change/{id}', ['as' => 'pages.changepasien', 'uses' => 'App\Http\Controllers\PasienController@changepasien']);
		Route::post('pasien/update', ['as' => 'pages.updatepasien', 'uses' => 'App\Http\Controllers\PasienController@updatepasien']);
		Route::get('pasien/delete/{id}', ['as' => 'pages.deletepasien', 'uses' => 'App\Http\Controllers\PasienController@deletepasien']);
		Route::get('pasien/detail/{id}', ['as' => 'pages.detailpasien', 'uses' => 'App\Http\Controllers\PasienController@detailpasien']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});