@extends('layout') @section('content')
<h1>Captcha Case</h1>


@if(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif 
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<form action="/captcha/verify" method="POST">
  {{ csrf_field() }}
  <input type="input" name="captchaCode"> <image src='/captcha/image' />
  <input type="submit" value="verify">
</form>


@endsection