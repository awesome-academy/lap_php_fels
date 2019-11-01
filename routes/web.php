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

Route::prefix('/home')->group(function () {
    Route::get('/', 'HomeController@index')->name('homepage');
});

Route::prefix('/profile')->group(function () {
    Route::get('/{id}', 'ProfileController@index')->name('get.profile');
    Route::get('/edit/{id}', 'ProfileController@getEditProfile')->name('get.edit.profile');
    Route::post('/edit/{id}', 'ProfileController@postEditProfile')->name('post.edit.profile');
});

Route::prefix('/course')->group(function () {
    Route::get('/{slug}-{id}', 'CourseController@index')->name('get.course');
    Route::get('/lessions/{id}-{slug}', 'LessionController@index')->name('get.all.lession');
    Route::get('/lession/{id}-{slug}', 'LessionController@getLession')->name('get.detail.lession');
    Route::post('/quiz/{lession_id}-{test_id}', 'LessionController@getAnswers')->name('answer.question');
});

Auth::routes();
