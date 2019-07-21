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
        Route::resource('events/{event}/groups', 'GroupsController');
        Route::resource('events', 'EventsController');
        Route::get('events/{id}/groups/{group}', 'GroupsController@show');
     //   Route::put('events/{id}/groups/{group}/{judoka}', 'GroupsController@update');
        Route::get('groupsInfo/{id}', 'GroupsController@showCat');
        Route::get('events/{event}/competitors/{id}', 'CompetitorsController@show');
        Route::delete('events/{id}/groups/{group}/{judoka}', 'CompetitorsController@destroy');
        Route::put('events/{id}/groups/{group}/{judoka}', 'CompetitorsController@store');
        Route::get('events/{id}/groups/{group}/{competitor}/pdf', 'GroupsController@printPDF');

Route::get('events/{event}/competitors/{id}/excel', 'CompetitorsController@excel')->name('competitors.excel');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
    });

});
