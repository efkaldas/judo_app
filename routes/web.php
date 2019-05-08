<?php

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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('judokas', 'JudokasController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/approval', 'JudokasController@approval')->name('approval');

    Route::middleware(['approved'])->group(function () {
        Route::get('/judokas', 'JudokasController@index')->name('home');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
    });
Route::resource('groups', 'GroupsController');
Route::get('events/create', 'EventsController@create')->name('event.create');
});
