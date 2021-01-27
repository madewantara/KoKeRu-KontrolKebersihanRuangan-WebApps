<?php

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

Route::get('/', [App\Http\Controllers\GuestController::class, 'index']);

Auth::routes();

Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index']);

Auth::routes();

Route::get('/login',function(){
	return view ('auth/login');
})->name('login');

Route::get('/icons', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');

Auth::routes();

Route::post('upload',[App\Http\Controllers\UserController::class,'store']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables_view']);
	Route::get('tables_create', ['as' => 'pages.tables_create', 'uses' => 'App\Http\Controllers\PageController@tables_create']);
	// Route::get('tables_create', ['as' => 'pages.tables_create', 'uses' => 'App\Http\Controllers\PageController@tables_create_cs']);
	// Route::get('tables_create', ['as' => 'pages.tables_create', 'uses' => 'App\Http\Controllers\PageController@tables_create_ruang']);
	Route::get('tables_edit/{id_task}', ['as' => 'tables_edit/{id_task}', 'uses' => 'App\Http\Controllers\PageController@tables_edit']);



	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
	Route::post('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables_store']);
	// Route::post('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables_edit_store']);
	Route::patch('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables_edit_store']);

	Route::get('tables_destroy/{id_task}', [App\Http\Controllers\PageController::class, 'tables_destroy'])->name('tables_destroy');
	Route::post('tables_destroy/{id_task}', [App\Http\Controllers\PageController::class, 'tables_destroy'])->name('tables_destroy');
	Route::get('tables_reset', [App\Http\Controllers\PageController::class, 'tables_reset']);
	Route::post('tables_reset', [App\Http\Controllers\PageController::class, 'tables_reset']);
	Route::get('/cetak_pdf', [App\Http\Controllers\CetakController::class, 'index']);
	Route::get('/cetak_pdf_tgl/{date_awal}/{date_akhir}/{status}', [App\Http\Controllers\CetakController::class, 'CetakPerTanggal']);
	Route::get('/cetak_excel', [App\Http\Controllers\CetakController::class, 'cetakexcel']);

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});