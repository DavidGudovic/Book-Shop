@extends('templates.app')

@section('content')

<!--Wrapper of profil-->
<div class="w-screen min-h-screen">

  <x-heading>
    Profil Korisnika
  </x-heading>

<!-- Profile -->
<div class="flex flex-col md:flex-row gap-10 justify-center w-full h-full px-10 md:px-36">
  <!-- Responsive menu -->
  <div class="mb-6 md:mb-0">
    <div class="flex flex-col border border-black px-8">
      <a href="{{route('user.show', auth()->user())}}" class="py-8 border-b border-gray-800 font-bold text-xl">
        <i class="{{ Route::currentRouteName() === 'user.show' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Informacije</a>
      <a href="" class="py-8 border-b border-gray-800 font-bold text-xl">
        <i class="{{ Route::currentRouteName() === 'user.shoA' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Istorija narudžbina</a>
      <a href="" class="py-8 border-b border-gray-800 font-bold text-xl">
        <i class="{{ Route::currentRouteName() === 'user.shoA' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Reklamacije</a>
      <a href="{{route('user.delete', auth()->user())}}" class="py-8 font-bold text-xl">
        <i class="{{ Route::currentRouteName() === 'user.delete' ? 'fa-solid fa-play fa-2xs' : '' }}"></i> Deaktivacija naloga</a>
    </div>
  </div>
  <!-- End menu -->
  <!-- Action window display -->
  <div class="flex-1 h-screen mb-20">
      @yield('window')
  </div>
  <!-- End window -->
</div>
<!--End wrapper -->

</div>

@endsection
