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
}
);

Route::get('/captcha', function (Request $request) {
	$code = rand(1000,9999);
	session(["code",$code]);
	$im = imagecreatetruecolor(50, 24);
	$bg = imagecolorallocate($im, 22, 86, 165);
	$fg = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0, 0, $bg);
	imagestring($im, 5, 5, 5,  $code, $fg);
	imagepng($im);
	imagedestroy($im);
	return response(null)->withHeaders(["Cache-Control"=> "no-cache, must-revalidate",'Content-type'=>' image/png']);
	
}
);
