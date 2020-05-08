<?php
error_reporting(0);
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
    return view('welcome');
});

Route::group(['middleware'=>'web'],function(){


    Route::prefix('/new_project/admin')->name('admin-')->group(function(){
        Route::get('/login','Admin\DashboardController@login')->name('login');
        Route::post('/login/check','Admin\DashboardController@loginCheck')->name('loginCheck');
        Route::get('/logout','Admin\DashboardController@logout')->name('logout');
        Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
        Route::get('/list','Admin\RegistrationController@list')->name('registration-form');


        Route::get('/register','Admin\RegistrationController@readItems')->name('register');
        Route::post('/addItem', 'Admin\RegistrationController@addItem');
        Route::post('/editItem', 'Admin\RegistrationController@editItem');
        Route::post('/deleteItem', 'Admin\RegistrationController@deleteItem');
    });
});
