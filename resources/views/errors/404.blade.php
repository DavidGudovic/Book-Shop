@extends('templates.errors')
      @section('phone-error') <img src="{{URL('/images/util/404-phone.jpg')}}" alt="" class="md:hidden w-screen h-screen"> @endsection
      @section('md-error') <img src="{{URL('/images/util/404-md.jpg')}}" alt="" class="hidden md:flex w-screen h-screen">  @endsection
