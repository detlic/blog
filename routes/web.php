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
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/image_upload', function () {
    return view('image_upload');
});///////
//Route::post('image_upload', 'ImagesController@store');
Route::delete('place/{id}', 'PlaceController@destroy_image');
Route::post('place/{id}', 'PlaceController@addimages');
//Route::get('image_upload','ImagesController@create');
//Route::get('image_upload', 'ImagesController@index');
Route::resource('places','PlaceController');
//Route::post('places', 'ImagesController@store');
Auth::routes();

Route::get('/home', 'HomeController@index');
