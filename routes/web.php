<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/blog', function () {
//     return view('blog');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/center', function () {
    return view('center');
});

Route::get('/projects', 'ProjectController@index');

Route::get('/events', 'EventController@index');

Route::get('/videos', 'VideoController@index');

Route::get('/team', 'TeamController@index');

Route::get('/login', function () {
    return view('login');
});


Route::post('/login', 'UserController@login');


Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', 'UserController@signup');

Route::get('/admin/projects', 'ProjectController@admin_page');
Route::get('/admin/projects_edit', 'ProjectController@admin_edit');


Route::get('/admin/events', 'EventController@admin_page');
Route::get('/admin/events_edit', 'EventController@admin_edit');

Route::get('/admin/videos', 'VideoController@admin_page');
Route::get('/admin/videos_edit', 'VideoController@admin_edit');

Route::get('/admin/team', 'TeamController@admin_page');
Route::get('/admin/team_edit', 'TeamController@admin_edit');


Route::get('/admin/users', 'UserController@admin_page');
Route::get('/admin/user_edit', 'UserController@admin_edit');

Route::get('/admin/logout', function () {
    session()->forget('loginData');
    return redirect('login');
});