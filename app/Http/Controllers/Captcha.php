<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class Captcha extends Controller
{
    public function image(){
        $code = strval(rand(1000,9999));
        session(["captchaCode"=>$code]);
        $im = imagecreatetruecolor(50, 24);
        $bg = imagecolorallocate($im, 22, 86, 165);
        $fg = imagecolorallocate($im, 255, 255, 255);
        imagefill($im, 0, 0, $bg);
        imagestring($im, 5, 5, 5,  $code, $fg);
        imagepng($im);
        imagedestroy($im);
        return response(null)->withHeaders(["Cache-Control"=> "no-cache, must-revalidate",'Content-type'=>' image/png']);
    }
    
    public function index(){
        return view('captcha');
    }

    public function verify(){
        $captchaCode=Input::get("captchaCode");
        if(session("captchaCode")===$captchaCode){
             return redirect('/captcha')->with('success', 'Success!');
        }else{ 
          return  redirect('/captcha')->with('error', 'Error:not match');
        }
    }
}