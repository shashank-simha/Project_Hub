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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
Route::post('/tasks/adduser', 'TasksController@adduser')->name('tasks.adduser');
Route::post('/projects/removeuser', 'ProjectsController@removeuser')->name('projects.removeuser');
Route::post('/tasks/removeuser', 'TasksController@removeuser')->name('tasks.removeuser');

Route::resource('companies', 'CompaniesController');
Route::resource('projects', 'ProjectsController');
Route::resource('roles', 'RolesController');
Route::resource('tasks', 'TasksController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');