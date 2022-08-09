<nav class="sticky top-0 max-h-16 bg-black text-white">
  <!-- Nav items -->
  <ul class="flex items-center justify-around w-full py-4">
    <!-- Generic nav links -->
    <li><a href="{{ route('home') }}" >Početna</a></li>
    <li><a href="{{ route('books.index') }}" >Ponuda</a></li> <!-- TODO Make dropdown? -->
    <!-- End generic -->
    @admin
    <!-- Admin specific links -->
    <li><a href="">Administracija</a></li>
    <!-- End admin specific links -->
    @endadmin
    @auth
      <!-- User specific links -->
      <li><a href="" >{{auth()->user()->username}}</a></li>
      <li><a href="{{ route('logout') }}" >Odjavi se</a></li>
      <!-- End user links -->
    @endauth
    @guest
      <!-- Authentication links -->
      <li><a href="{{ route('register')}}">Registracija</a></li>
      <li><a href="{{ route('login') }}">Ulogujte se</a></li>
      <!-- End Authentication -->
    @endguest
  </ul>
  <!-- End nav items -->
</nav>
