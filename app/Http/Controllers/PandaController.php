<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PandaController extends Controller
{
    public function index(){
        $size=100;
        $faceSize=$size;
        $earSize=$size/3;
        $eyeSize=$size/3;
        $noseSize=$eyeSize;
        $upMouth=$eyeSize/3;
        $downMouth=$upMouth*1.5;
        $wrinkle=$downMouth;
        $cheek=$upMouth*1.5;
        $bodyWidth= $size*0.9;
        $bodyHeight= $size*1.2;
        $footSize=$earSize/1.5;
        $y=180;
        $x=180;
        
        
        $im=imagecreatetruecolor(500, 500);
        imagefill($im, 0, 0,imagecolorallocate($im,255,255, 255));
        $colorBlack=imagecolorallocate($im,0,0, 0);
        $colorWhite=imagecolorallocate($im,255,255, 255);
        $colorRed=imagecolorallocate($im,255,0, 0);
        
        //foot
        imagefilledellipse  ( $im , $x-$faceSize/2.5 , $y+$size*1.2 , $footSize ,$footSize , $colorBlack);
        imagefilledellipse  ( $im , $x+$faceSize/3 , $y+$size*1.2 , $footSize ,$footSize , $colorBlack);
        
        //body
        $this->roundRect($im,$x-$size/1.72,$y+$size/5,$bodyWidth*0.2,$bodyHeight*0.5,$colorBlack,$colorBlack);
        $this->roundRect($im,$x+$size/3.333,$y+$size/5,$bodyWidth*0.2,$bodyHeight*0.5,$colorBlack,$colorBlack);
        $this->roundRect($im,$x-50,$y+50,$bodyWidth,$bodyHeight-80,$colorWhite,$colorBlack);
        
        //ear
        // imagefilledellipse();
        imagefilledellipse($im ,$x-$faceSize/2.5,$y-$faceSize/2.5,$earSize,$earSize,$colorBlack);
        imagefilledellipse($im ,$x+$faceSize/3,$y-$faceSize/2.5,$earSize,$earSize,$colorBlack);
        
        //face
        $offset=5;
        imagefilledellipse($im,$x-$offset,$y,$faceSize/0.8,$faceSize,$colorWhite);
        imageellipse($im,$x-$offset-1,$y-1,$faceSize/0.8+1,$faceSize+1,$colorBlack);
        
        
        //eyes
        //ellipse(x-faceSize/4,y-faceSize/7,eyeSize*1.3,eyeSize*1.2);
        imagefilledellipse($im,$x-$offset-$faceSize/4,$y-$faceSize/7,$eyeSize*1.3,$eyeSize*1.2,$colorBlack);
        imagefilledellipse($im,$x-$offset+$faceSize/4,$y-$faceSize/7,$eyeSize*1.3,$eyeSize*1.2,$colorBlack);
        
        //ellipse(x-faceSize/4,y-faceSize/7,eyeSize*1.3,eyeSize/3);
        // ellipse(x+faceSize/4,y-faceSize/7,eyeSize*1.3,eyeSize/3);
        imagefilledellipse($im,$x-$offset-$faceSize/4,$y-$faceSize/7,$eyeSize*1.3,$eyeSize/3,$colorWhite);
        imagefilledellipse($im,$x-$offset+$faceSize/4,$y-$faceSize/7,$eyeSize*1.3,$eyeSize/3,$colorWhite);
        
        imagefilledellipse($im,$x-$offset-$faceSize/4,$y-$faceSize/7,$eyeSize/4,$eyeSize/4,$colorBlack);
        imagefilledellipse($im,$x-$offset+$faceSize/4,$y-$faceSize/7,$eyeSize/4,$eyeSize/4,$colorBlack);
        
        //nose
        
        imagefilledellipse($im,$x-$offset-$faceSize/30,$y+$offset*2-$faceSize/18,$eyeSize/8,$eyeSize/8,$colorBlack);
        imagefilledellipse($im,$x-$offset+$faceSize/30,$y+$offset*2-$faceSize/18,$eyeSize/8,$eyeSize/8,$colorBlack);
        
        
        //mouth
        
        imagefilledarc($im,$x-$offset*0.6-$faceSize/16,$y+$offset*3+$faceSize/18,$upMouth,$upMouth,180,360,$colorRed,IMG_ARC_EDGED);
        imagefilledarc($im,$x+$offset*1.4-$faceSize/16,$y+$offset*3+$faceSize/18,$upMouth,$upMouth,180,360,$colorRed,IMG_ARC_EDGED);
        imagefilledarc($im,$x+$offset*1.5-$faceSize/8,$y+$faceSize/5,$downMouth*1.5,$downMouth,0,180,$colorRed,IMG_ARC_EDGED);
        imageline( $im,$x-$offset*0.6-$faceSize/8, $y+$faceSize/5, $x+$offset*1.4, $y+$faceSize/5, $colorBlack);
        
        ////cheek
        imagefilledellipse($im,$x-$offset+$faceSize/2,$y+$faceSize/5,$cheek,$cheek,$colorRed);
        imagefilledellipse($im,$x-$offset-$faceSize/2,$y+$faceSize/5,$cheek,$cheek,$colorRed);
        
        //wrinkle
        imageline( $im,$x-$offset-$faceSize/20,$y-$faceSize/2,$x-$offset-$faceSize/20,$y-$faceSize/3, $colorBlack);
        imageline( $im,$x-$offset+$faceSize/20,$y-$faceSize/2,$x-$offset+$faceSize/20,$y-$faceSize/3, $colorBlack);
        imageline( $im,$x-$offset-$faceSize/25,$y-$faceSize/3,$x-$offset-$faceSize/10,$y-$faceSize/4, $colorBlack);
        imageline( $im,$x-$offset+$faceSize/20,$y-$faceSize/3,$x-$offset+$faceSize/10,$y-$faceSize/4, $colorBlack);
        
        //check wrinkle
        
        imageline( $im,$x-$offset-$faceSize/2.5,$y-$faceSize/20,$x-$offset-$faceSize/3,$y+$faceSize/3, $colorBlack);
        imageline( $im,$x-$offset+$faceSize/2.8,$y+$faceSize/30,$x-$offset+$faceSize/3,$y+$faceSize/3, $colorBlack);
        
        //     	line(x-faceSize/3,y+faceSize/3, x-faceSize/5, y+faceSize/2.1);
        // line(x+faceSize/3,y+faceSize/3, x+faceSize/5, y+faceSize/2.1);
        imageline( $im,$x-$offset-$faceSize/3,$y+$faceSize/3,$x-$offset-$faceSize/5,$y+$faceSize/2.1, $colorBlack);
        imageline( $im,$x-$offset+$faceSize/3,$y+$faceSize/3,$x-$offset+$faceSize/5,$y+$faceSize/2.1, $colorBlack);
        
        
        
        imagepng($im);
        imagedestroy($im);
        return response(null)->withHeaders(["Cache-Control"=> "no-cache, must-revalidate",'Content-type'=>' image/png']);
        // return view('captcha');
    }
    
    function roundRect($im,$x,$y,$width,$height,$filledcolor,$strokecolor){
        
        
        
        imageellipse($im,$x+$width/2-1,$y-1,$width+1,$width+1,$strokecolor);
        imageellipse($im,$x+$width/2-1,$y+$height-1,$width+1,$width+1,$strokecolor);
        imageellipse($im,$x+$width/2+1,$y+$height+1,$width+1,$width+1,$strokecolor);
        imagerectangle($im,$x,$y,$x+$width,$y+$height,$strokecolor);
        
        imagefilledellipse($im,$x+$width/2,$y,$width,$width,$filledcolor);
        imagefilledellipse($im,$x+$width/2,$y+$height,$width,$width,$filledcolor);
        imagefilledrectangle($im,$x,$y,$x+$width,$y+$height,$filledcolor);
        
    }
    
}