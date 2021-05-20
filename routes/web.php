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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//ROUTE  LOGIN
Auth::routes();
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::get('/', 'PostController@index')->name('home');
Route::get('search', 'PostController@search')->name('search');

//ROUTE USER
Route::prefix('user')->group(function (){
    Route::get('{id}/profile', 'UserController@show')->name('user.profile');
    Route::get('{id}/edit', 'UserController@edit')->name('user.edit_profile')->middleware('auth');
    Route::post('{id}/edit', 'UserController@update')->name('user.update_profile')->middleware('auth');
    Route::get('{id}/pass', 'UserController@change_password')->name('user.change_password')->middleware('auth');
    Route::post('{id}/pass', 'UserController@update_password')->name('user.update_password')->middleware('auth');
});

//ROUTE POST
Route::prefix('post')->group(function () {
    Route::get('/{id}/show', 'PostController@post')->name('post.content');
    Route::get('/create', 'PostController@create')->name('post.create')->middleware('auth');
    Route::post('/create', 'PostController@store')->name('post.store')->middleware('auth');
    Route::get('/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
    Route::post('/edit/{id}', 'PostController@update')->name('post.update')->middleware('auth');
    Route::get('/destroy/{id}', 'PostController@destroy')->name('post.destroy')->middleware(['auth','can:delete']);
});

// ROUTE LIKE
Route::middleware('auth')->get('{id}/like', 'LikeController@like')->name('post.like');


//ROUTE COMMENT
Route::middleware('auth')->prefix('comment')->group(function () {
    Route::post('/create/{id}', 'CommentController@store')->name('comment.store');
    Route::get('/delete/{id}', 'CommentController@destroy')->name('comment.destroy');
});

//ROUTE ADMIN
Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    //user
    Route::prefix('users')->group(function () {
        Route::get('/list', 'UserController@getList');
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/create', 'UserController@store')->name('admin.user.store');
        Route::get('/{id}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::post('/{id}/edit', 'UserController@update')->name('admin.user.update');
        Route::get('/{id}/delete', 'UserController@destroy')->name('admin.user.destroy');
        //
        Route::get('{id}/show', 'RoleController@showUser')->name('admin.user.show');
        Route::post('{id}/show', 'RoleController@role')->name('admin.user.role');
    });

    //category
    Route::prefix('categories')->group(function () {
        Route::get('/list', 'CategoryController@getList');
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/create', 'CategoryController@store')->name('admin.category.store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('/{id}/edit', 'CategoryController@update')->name('admin.category.update');
        Route::get('/{id}/delete', 'CategoryController@destroy')->name('admin.category.destroy');
    });

    //post
    Route::prefix('posts')->group(function () {
        Route::get('/list', 'PostController@getList');
        Route::get('/', 'PostController@listPost')->name('admin.post.index');
        Route::get('/create', 'PostController@create')->name('admin.post.create');
        Route::post('/create', 'PostController@store')->name('admin.post.store');
        Route::get('/{id}/edit', 'PostController@edit')->name('admin.post.edit');
        Route::post('/{id}/edit', 'PostController@update')->name('admin.post.update');
        Route::get('/{id}/delete', 'PostController@destroy')->name('admin.post.destroy');
        //

    });
});
