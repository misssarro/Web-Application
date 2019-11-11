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
Route::get('/home', function(){
  return "This is a homepage";
});
Route::get('/anotherhomepage',function(){
  return "This is another homepage";
});
Route::redirect('/anotherhomepage','/home',301);

Route::get('users/{id?}',function($id=null){
  return "user page".$id;
});
Route::get('animals','AnimalController@index')->name('animals.index');
Route::get('animals/create','AnimalController@create')->name('animals.create');
Route::post('animals','AnimalController@store')->name('animals.store');
Route::get('animals/{id}','AnimalController@show')
  -> name('animals.show');
Route::delete('animals/{id}','AnimalController@destroy')
  ->name('animals.destroy'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
