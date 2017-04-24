<?php


/*
-----------------------------------------------------------------
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
    session('code', '$code');
});

Route::get('/captcha/image',"Captcha@image");
Route::get('/captcha',"Captcha@index");
Route::post('/captcha/verify',"Captcha@verify");