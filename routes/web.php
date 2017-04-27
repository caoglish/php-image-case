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

Route::get('/captcha/image',"CaptchaController@image");
Route::get('/captcha',"CaptchaController@index");
Route::get('/captcha/example',"CaptchaController@example");
Route::get('/captcha/exampleImage',"CaptchaController@exampleImage");
Route::post('/captcha/verify',"CaptchaController@verify");

Route::get('/panda',"PandaController@index");