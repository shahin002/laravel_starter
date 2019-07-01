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

//Route::get('/test-routes', 'TestController@index')->name('testing_url');
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/', 'PostController@index')->name('home');

Route::prefix('administrator')->namespace('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('home');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('', 'UserController@index')->middleware('permission:users.view')->name('index');
        Route::get('create', 'UserController@create')->middleware('permission:users.create')->name('create');
        Route::post('users', 'UserController@store')->middleware('permission:users.create')->name('store');
//        Route::get('{user}', 'UserController@show')->middleware('permission:users.view')->name('show');
        Route::get('{user}/edit', 'UserController@edit')->middleware('permission:users.edit')->name('edit');
        Route::put('{user}', 'UserController@update')->middleware('permission:users.edit')->name('update');
        Route::delete('{user}', 'UserController@destroy')->middleware('permission:users.delete')->name('destroy');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('', 'RoleController@index')->middleware('permission:roles.view')->name('index');
        Route::get('create', 'RoleController@create')->middleware('permission:roles.create')->name('create');
        Route::post('roles', 'RoleController@store')->middleware('permission:roles.create')->name('store');
//        Route::get('{role}', 'RoleController@show')->middleware('permission:roles.view')->name('show');
        Route::get('{role}/edit', 'RoleController@edit')->middleware('permission:roles.edit')->name('edit');
        Route::put('{role}', 'RoleController@update')->middleware('permission:roles.edit')->name('update');
        Route::delete('{role}', 'RoleController@destroy')->middleware('permission:roles.delete')->name('destroy');
    });

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('', 'PostController@index')->middleware('permission:posts.view')->name('index');
        Route::get('create', 'PostController@create')->middleware('permission:posts.create')->name('create');
        Route::post('posts', 'PostController@store')->middleware('permission:posts.create')->name('store');
        Route::get('{post}', 'PostController@show')->middleware('permission:posts.view')->name('show');
        Route::get('{post}/edit', 'PostController@edit')->middleware('permission:posts.edit')->name('edit');
        Route::put('{post}', 'PostController@update')->middleware('permission:posts.edit')->name('update');
        Route::delete('{post}', 'PostController@destroy')->middleware('permission:posts.delete')->name('destroy');
    });
});

Route::resource('posts', 'PostController');
