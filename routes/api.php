<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function () {
    Route::post('sign-in', 'api\UserController@login');
    Route::post('sign-up', 'api\UserController@register');

    /*Authenticated routes */
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'api\UserController@logout');
        /*user related api*/
        Route::get('user-info', 'api\UserController@userDetails');
        Route::get('user-info/{user}', 'api\UserController@userDetailsById')->middleware('permission:users.view');
        Route::get('user-list', 'api\UserController@userList')->middleware('permission:users.view');
        Route::post('administrator/users/create', 'api\UserController@userCreate')->middleware('permission:users.create');
        Route::put('administrator/users/{user}', 'api\UserController@userEdit')->middleware('permission:users.edit');
        Route::delete('administrator/users/{user}', 'api\UserController@userDelete')->middleware('permission:users.delete');

        /*end user related api*/

        /*role permission related api*/
        Route::get('roles-list', 'api\RolePermissionController@getRoles');
        Route::get('permissions-list', 'api\RolePermissionController@getPermissions');
        /*end role permission related api*/

        /*post related api*/
        Route::get('administrator/posts', 'api\PostController@index')->middleware('permission:posts.view');
        Route::post('administrator/posts', 'api\PostController@store')->middleware('permission:posts.create');
        Route::get('administrator/posts/{post}', 'api\PostController@show')->middleware('permission:posts.view');
        Route::put('administrator/posts/{post}', 'api\PostController@update')->middleware('permission:posts.edit');
        Route::delete('administrator/posts/{post}', 'api\PostController@destroy')->middleware('permission:posts.delete');
        /*end post related api*/
    });

});
