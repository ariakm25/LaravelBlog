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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    //Posts Section
    Route::get('/post/create', [
        'uses'  => 'PostsController@create',
        'as'    => 'post.create'
    ]);
    
    Route::post('/post/store', [
        'uses'  => 'PostsController@store',
        'as'    => 'post.store'
    ]);    

    Route::get('/posts', [
        'uses'  => 'PostsController@index',
        'as'    => 'posts.index'
    ]);

    Route::get('/post/edit/{id}', [
        'uses'  => 'PostsController@edit',
        'as'    => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses'  => 'PostsController@update',
        'as'    => 'post.update'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'  => 'PostsController@destroy',
        'as'    => 'post.delete'
    ]);

    Route::get('/posts/trash', [
        'uses'  => 'PostsController@trash',
        'as'    => 'posts.trash'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses'  => 'PostsController@restore',
        'as'    => 'post.restore'
    ]);

    Route::get('/post/deletePermanently/{id}', [
        'uses'  => 'PostsController@deletePermanently',
        'as'    => 'post.deletePermanently'
    ]);

    //Categories Section
    Route::get('/category/create', [
        'uses'  => 'CategoriesController@create',
        'as'    => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses'  => 'CategoriesController@store',
        'as'    => 'category.store'
    ]);
    Route::get('/category', [
        'uses'  => 'CategoriesController@index',
        'as'    => 'categories'
    ]);

    Route::get('/category/edit/{id}', [
        'uses'  => 'CategoriesController@edit',
        'as'    => 'category.edit'
    ]);

    Route::post('/category/edit/{id}', [
        'uses'  => 'CategoriesController@update',
        'as'    => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses'  => 'CategoriesController@destroy',
        'as'    => 'category.delete'
    ]);

    //Tags Section
    Route::get('/tag/create', [
        'uses'  => 'TagsController@create',
        'as'    => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses'  => 'TagsController@store',
        'as'    => 'tag.store'
    ]);
    Route::get('/tags', [
        'uses'  => 'TagsController@index',
        'as'    => 'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses'  => 'TagsController@edit',
        'as'    => 'tag.edit'
    ]);

    Route::post('/tag/edit/{id}', [
        'uses'  => 'TagsController@update',
        'as'    => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses'  => 'TagsController@destroy',
        'as'    => 'tag.delete'
    ]);

    //Users Section
    Route::get('/user/create', [
        'uses'  => 'UsersController@create',
        'as'    => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses'  => 'UsersController@store',
        'as'    => 'user.store'
    ]);
    Route::get('/users', [
        'uses'  => 'UsersController@index',
        'as'    => 'users'
    ]);

    Route::get('/user/edit/{id}', [
        'uses'  => 'UsersController@edit',
        'as'    => 'user.edit'
    ]);

    Route::post('/user/edit/{id}', [
        'uses'  => 'UsersController@update',
        'as'    => 'user.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses'  => 'UsersController@destroy',
        'as'    => 'user.delete'
    ]);

    //Profiles Section
    Route::get('/user/profile', [
        'uses'  => 'ProfilesController@edit',
        'as'    => 'profile.edit'
    ]);
    Route::post('/user/profile/update', [
        'uses'  => 'ProfilesController@update',
        'as'    => 'profile.update'
    ]);

    //CategoryApp Section
    Route::get('/app/category/create', [
        'uses'  => 'CategoryAppsController@create',
        'as'    => 'categoryApp.create'
    ]);

    Route::post('/app/category/store', [
        'uses'  => 'CategoryAppsController@store',
        'as'    => 'categoryApp.store'
    ]);
    Route::get('/app/categories', [
        'uses'  => 'CategoryAppsController@index',
        'as'    => 'categoryApps'
    ]);

    Route::get('/app/category/edit/{id}', [
        'uses'  => 'CategoryAppsController@edit',
        'as'    => 'categoryApp.edit'
    ]);

    Route::post('/app/category/edit/{id}', [
        'uses'  => 'CategoryAppsController@update',
        'as'    => 'categoryApp.update'
    ]);

    Route::get('/app/category/delete/{id}', [
        'uses'  => 'CategoryAppsController@destroy',
        'as'    => 'categoryApp.delete'
    ]);

    //Posts Section
    Route::get('/app/create', [
        'uses'  => 'AppsController@create',
        'as'    => 'app.create'
    ]);
    
    Route::post('/app/store', [
        'uses'  => 'AppsController@store',
        'as'    => 'app.store'
    ]);    

    Route::get('/apps', [
        'uses'  => 'AppsController@index',
        'as'    => 'apps.index'
    ]);

    Route::get('/app/edit/{id}', [
        'uses'  => 'AppsController@edit',
        'as'    => 'app.edit'
    ]);

    Route::post('/app/update/{id}', [
        'uses'  => 'AppsController@update',
        'as'    => 'app.update'
    ]);

    Route::get('/app/delete/{id}', [
        'uses'  => 'AppsController@destroy',
        'as'    => 'app.delete'
    ]);

});
