@extends('templates.app')

@section('content')
  <!--Wrapper of admin dashboard-->
  <div class="flex flex-col w-full h-full px-6 md:px-44">
    <!-- Upper part -->
    <div class="flex flex-col w-full justify-center">
      <x-heading> Administracija </x-heading>
      <!-- Links -->
      <div class="flex flex-col md:flex-row w-full py-6 gap-6 md:gap-0 border border-black font-bold text-center ">
        <a class="w-full {{ Route::currentRouteName() === 'admin.orders.index' ? 'underline' : '' }}" href="{{route('admin.orders.index')}}">Narudžbine</a>
        <a class="w-full {{ Route::currentRouteName() === 'admin.reclamations.index' ? 'underline' : '' }}" href="{{route('admin.reclamations.index')}}">Reklamacije</a>
        <a class="w-full {{ Route::currentRouteName() === 'admin.books.index' ? 'underline' : '' }}" href="{{route('admin.books.index')}}">Proizvodi</a>
        <a class="w-full {{ Route::currentRouteName() === 'admin.users.index' ? 'underline' : '' }}" href="{{route('admin.users.index')}}">Korisnici</a>
        <a class="w-full {{ Route::currentRouteName() === 'admin.reports.index' ? 'underline' : '' }}" href="{{route('admin.reports.index')}}">Izveštaji</a>
      </div>
      <!-- End links-->
    </div>
    <!-- End upper -->
    <div class="flex flex-col h-full">
      @yield('dashboard')
    </div>
  </div>
  <!-- End dashboard -->
@endsection
