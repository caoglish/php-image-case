@extends('layout') @section('content')
<h1>Captcha Example</h1>
<image src='/captcha/exampleImage' />
<image src='/captcha/exampleImage?backgroundColor=0&numberOfscrambleBackgroud=0&charListOfCode=0101001101' />
<image src='/captcha/exampleImage?width=100&height=100' />
<image src='/captcha/exampleImage?numberOfscrambleBackgroud=100' />
<image src='/captcha/exampleImage?numberOfLetter=3' />
<image src='/captcha/exampleImage?backgroundColor=0' />
<image src='/captcha/exampleImage?leftOfFirstLetter=15&numberOfLetter=25&width=450&numberOfscrambleBackgroud=20' />
@endsection