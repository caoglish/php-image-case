<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Captcha extends Controller
{
    $code = rand(1000,9999);
    Session::set("code",$code);
    
    

}
