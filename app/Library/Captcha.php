<?php
namespace App\Library;

Class Captcha {
    
    protected $charListOfCode = "abcdefghijklmnpqrstuvwxyz123456789";
    protected $imageWidth=100;
    protected $imageHeight=50;
    protected $numberOfLetter=6;
    protected $backgroundColor=100;
    protected $leftOfFirstLetter=15;
    protected $numberOfscrambleBackgroud=15;
    protected $im;
    
    function __construct($w=null,$h=null){
        $w=$w?$w:$this->imageWidth;
        $h=$h?$h:$this->imageHeight;
        $this->im=imagecreatetruecolor($w, $h);
        $this->numberOfscrambleBackgroud=rand(8,20);
    }
    
    function __set($key,$value){
        $this->$key=$value;
    }
    
    function createImage($code)
    {
        $charList=str_split($code);
        $im=$this->im;
        
        imagefill($im, 0, 0,$this->randcolor(0,$this->backgroundColor));
        $this->scrambleBackgroud($this->numberOfscrambleBackgroud);
        for($i=0;$i<count($charList);$i++){
            imagestring($im, 5,$this->leftOfFirstLetter+10*($i)+($i)*rand(0,5), 15+rand(-10,10), $charList[$i], $this->randcolor(150,255));
        }
        imagepng($im);
        imagedestroy($im);
    }
    
    private function scrambleBackgroud($number){
        for ($i=0;$i<$number;$i++){
            $rand=function(){
                return rand(1,5);
            };
            imageline( $this->im, $this->imageWidth/$rand()*rand(0,2), $this->imageHeight/$rand()*rand(0,2), $this->imageWidth/$rand()*$rand(), $this->imageHeight/$rand(), $this->randcolor(0,255));
        }
    }
    
    private function randcolor($start,$end){
        return imagecolorallocate($this->im, rand($start,$end),rand($start,$end), rand($start,$end));
    }
    
    
    function createCode(){
        return  collect(str_split($this->charListOfCode))->shuffle()->slice(4,$this->numberOfLetter)->implode("");
    }
}