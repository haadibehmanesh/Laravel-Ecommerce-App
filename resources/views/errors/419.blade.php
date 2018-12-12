@extends('errors::layout')

@section('title', 'بازگشت به صفحه اصلی')

@section('message')
    @parent
    <i class="fa fa-warning"></i>
    <p>.لطفا از لینک زیر برای رفتن به صفحه اصلی استفاده کنید</p>
    <a class="" href="/">صفحه اصلی</a>
@endsection
