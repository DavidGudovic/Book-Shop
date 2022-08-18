@extends('templates.app')

@section('content')
  <!--Wrapper of admin dashboard-->
  <div class=" min-h-screen flex flex-col w-full">
    <!-- Upper part -->
    <div class="flex flex-col w-full justify-center">
      <p class="text-center text-2xl font-bold">Administracija</p>
      <!-- Links -->
      <div class="P-2 flex flex-row justify-between w-full">
        <a href="#">Narudžbine</a>
        <a href="#">Korisnici</a>
        <a href="#">Reklamacije</a>
        <a href="#">Proizvodi</a>
        <a href="#">Izveštaji</a>
      </div>
      <!-- End links-->
    </div>
    <!-- End upper -->
    <div class="">
      @yield('dashboard')
    </div>
  </div>
  <!-- End dashboard -->
@endsection
