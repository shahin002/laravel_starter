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

        Route::get('user-info', 'api\UserController@userDetails');
        Route::get('user-info/{id}', 'api\UserController@userDetailsById');
        Route::post('logout', 'api\UserController@logout');
        /*Post routes*/
        Route::resource('post', 'api\PostsController')->only('index', 'store', 'show', 'update', 'destroy');
        Route::get('my-list', 'api\PostsController@my_list');
        Route::post('search-post', 'api\PostsController@searchPost');
        /*End Post routes*/

        /*Like routes*/
        Route::resource('like', 'api\LikeController')->only('store', 'destroy');
        /*End Like Route*/

        /*Comment Route*/
        Route::resource('comment', 'api\CommentController')->only('store', 'show', 'update', 'destroy');
        /*End Comment routes*/

        /*Comment Reply routes*/
        Route::resource('comment-reply', 'api\CommentReplyController')->only('store', 'show', 'update', 'destroy');
        /*End Comment Reply routes*/

        /*Follow routes*/
        Route::resource('follow', 'api\FollowController')->only('store', 'destroy');
        Route::get('my-following-user', 'api\FollowController@my_following');
        /*End Follow routes*/

        /*follow a post*/
        Route::resource('post-follow', 'api\FollowPostController')->only('index', 'store');
        /*end follow a post*/

        /*User Details routes*/
        Route::resource('user-details', 'api\UserDetailController')->only('store', 'show');
        Route::post('pro-user-registration', 'api\UserDetailController@proUserRegistration');
        Route::get('pro-user-categories', 'api\UserCategoryController@index');
        /*End User Details Routes*/

        /*Share Routes*/
        Route::resource('share', 'api\ShareController')->only('store', 'show', 'update', 'destroy');
        /*End Share Routes*/
        /*Category route*/
        Route::resource('post-category', 'api\CategoryController')->only('index');
        /*End Category route*/
    });

});
