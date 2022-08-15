<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="David Gudović">
  <meta name="description" content="Online prodavnica knjizare Aurora">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>Knjižara Aurora</title>
  <link rel="icon" href="{{URL('icon.svg')}}">
  @vite('resources/js/app.js')
  @livewireStyles
</head>
<body>
  <a href="{{route('home')}}" class="fixed top-4 left-2 z-10 align-middle rounded-xl text-white text-center font-bold underline w-36"><< Početna</a>
  @yield('phone-error')
  @yield('md-error')
</body>
</html>
