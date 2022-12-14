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

// Route::view('/{any}', 'home')
//     ->where('any', '.*');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('save_student', 'StudentController@save_student');
Route::get('all_students', 'StudentController@all_students');
Route::get('all_teacher', 'TeacherController@all_teacher');
Route::get('all_students_library', 'StudentController@all_students_pagination_library');
Route::get('edit_student/{id}', 'StudentController@edit_student');
Route::get('search_student/{name}', 'StudentController@search_student');
Route::put('update_student', 'StudentController@update_student');
Route::delete('delete_student/{id}', 'StudentController@delete_student');