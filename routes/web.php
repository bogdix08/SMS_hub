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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/sms','SmsController@display');
Route::get('/service/sms','SmsController@sendSms');
Route::get('/service/register','SeedController@insert');
Route::post('/service/login','SeedController@login');
Route::get('/service/login','SeedController@login');
Route::get('/test', function () {
    return view('test');
});

Route::get('/contacts','ContactController@display');
Route::post('/contacts','ContactController@insert');
Route::get('contacts/delete/{id}', function ($id) {
    \App\Http\Controllers\ContactController::delete($id);
    return back();
});
Route::get('/ang', function () {
    return view('ang');
});

Route::get('/ang2', function () {
    return view('ang2');
});
Route::get('/delete/{id}', function ($id) {
    \App\Http\Controllers\SmsController::delete($id);
    return back();
});

Route::get('/seed_register', function () {
    return view('seed_register');
});

Route::get('/seed_login', function () {
    return view('seed_login');
});

Route::get('/seed', 'SeedController@statistics');

Route::post('/seed_register', 'SeedController@insert2');

Route::post('/seed_login', 'SeedController@login2');

Route::post('/sms','SmsController@insert');

Route::post('/register', 'UserController@insert');

Auth::routes();

Route::get('/seed_logout','SeedController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/pw', function () {
    return view('pw');
});
