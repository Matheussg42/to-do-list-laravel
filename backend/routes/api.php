<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'UserController@store')->name('users.store');
Route::post('login', 'UserController@login')->name('users.login');

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.verify'], function () {
  Route::apiResources([
    'tasklist'  =>  'TaskListController',
    'tasks'  =>  'TasksController',
  ]);

  Route::put('task/close/{id}', 'TasksController@closeTask')->name('tasks.closeTask');
  Route::get('list/tasks/{id}', 'TasksController@tasksByList')->name('tasks.tasksByList');
  Route::post('logout', 'UserController@logout')->name('users.logout');
});