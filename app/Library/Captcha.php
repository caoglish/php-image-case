<?php
namespace App\Library;

Class Captcha {
    
    protected $imageWidth=100;
    protected $imageHeight=50;
    const LetterList = "abcdefghijklmnpqrstuvwxyz123456789";
    protected $im;
    protected $numberOfscrambleBackgroud;

    function __construct(){
        $this->im=imagecreatetruecolor($this->imageWidth, $this->imageHeight);
        $this->numberOfscrambleBackgroud=rand(8,15);
    }
    
    function createImage($code)
    {
        $charList=str_split($code);
        $im=$this->im;
        
        imagefill($im, 0, 0, $this->randcolor(0,100));
        $this->scrambleBackgroud($this->numberOfscrambleBackgroud);
        for($i=0;$i<count($charList);$i++){
            imagestring($im, 5,30+10*($i)+($i)*rand(1,5), 15+rand(-10,10), $charList[$i], $this->randcolor(150,255));
        }
        imagepng($im);
        imagedestroy($im);
    }
    
    private function scrambleBackgroud($number){
        for($i=0;$i<$number;$i++){
            imageline( $this->im, $this->imageWidth/rand(1,5), $this->imageHeight/rand(1,5), $this->imageWidth/rand(1,5), $this->imageHeight/rand(1,5), $this->randcolor(0,255));
        }
    }

    private function randcolor($start,$end){
       return imagecolorallocate($this->im, rand($start,$end),rand($start,$end), rand($start,$end));
    }

    
    function createCode(){
        return  collect(str_split(self::LetterList))->shuffle()->slice(4,4)->implode("");
    }
}