<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function image(){
        $captcha = new \App\Library\Captcha;
        $code = $captcha->createCode();
        session(["captchaCode"=>$code]);
        $captcha->createImage($code);

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