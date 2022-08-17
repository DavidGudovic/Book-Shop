
@extends('templates.app')

@section('content')
<!--Wrapper of profil-->
<div class=" min-h-screen">

  <x-heading>
    Profil Korisnika
  </x-heading>

<!-- Profile -->
<div class="flex flex-col md:flex-row gap-6 justify-center w-full h-full px-10 md:px-36 mb-20">
  <!-- Side menus -->
  <div class="flex flex-col gap-6">
    <!-- Profile links -->
    <div class="mb-6 md:mb-0">
      <div class="flex flex-col border border-black px-8 md:w-72">
        <a href="{{route('user.show', auth()->user())}}" class="py-7 border-b border-gray-800 font-bold text-xl">
          <i class="{{ Route::currentRouteName() === 'user.show' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Informacije</a>
        <a href="{{route('user.orders.index', auth()->user())}}" class="py-7 border-b border-gray-800 font-bold text-xl">
          <i class="{{ Route::currentRouteName() === 'user.orders.index' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Istorija narudžbina</a>
        <a href="{{route('user.reclamations.index', auth()->user())}}" class="py-7 border-b border-gray-800 font-bold text-xl">
          <i class="{{ Route::currentRouteName() === 'user.reclamations.index' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Reklamacije</a>
        <a href="{{route('user.delete', auth()->user())}}" class="py-7 font-bold text-xl">
          <i class="{{ Route::currentRouteName() === 'user.delete' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Deaktivacija naloga</a>
      </div>
    </div>
    <!-- End Links -->
    <!--Filters optional -->
    <div class="mb-6 md:mb-0">
          @yield('filters')
    </div>
    <!--End filters optional -->
  </div>
  <!-- End side menus -->

    <!-- Action window display -->
    <div class="flex-1">
        @yield('window')
    </div>
    <!-- End window -->
 </div>
<!-- End profile -->
</div>
<!--End wrapper -->

@endsection
