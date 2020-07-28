<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Filesystem\Filesystem;

// app()->bind('example', function () {
// app()->singleton('App\Example', function () {

// 	dd('called');
// 	return new \App\Example;
// });

 app()->singleton('App\Services\Twitter', function () {
 	// return new Twitter('asasas');
 	return new \App\Services\Twitter('asdsadsadas');
 });

// 
Route::get('/', function () {
	// dd(app(Filesystem::class));
	// dd(app('example'), app('example'));
	dd(app('App\Example'));

	return view('welcome');
});

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

/*
 GET /projects (index)
 GET /projects/create (create)
 GET /projects/1 (show)
 POST /projects (store)
 GET /projects/1/edit (edit)
 PATCH /projects/1 (update)
 DELETE /projects/1 (destroy)
*/

 Route::resource('projects', 'ProjectsController');

// Route::get('/', 'PagesController@home');
Route::get('/about-us', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
// Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{project}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('/projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{project}', 'ProjectsController@update');
// Route::delete('/projects/{project}', 'ProjectsController@destroy');

// Route::get('/', function () {
//     return view('welcome',[
//         'foo' => 'foobar',
//         'tasks' => [
//             'Go to the store',
//             'Go to the market',
//             'Go to work',
//             'Go to the concert',
//         ],
//     ]);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about-us', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
