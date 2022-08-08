<nav class="sticky top-0 max-h-16 bg-black text-white">
  <ul class="flex items-center justify-around w-full py-4">
    <li><a href="{{ route('home') }}" >Početna</a></li>
    <li><a href="{{ route('home') }}" >Ponuda</a></li>
    @admin
    <li><a href="">Administracija</a></li>
    @endadmin
    @auth
      <li><a href="" >{{auth()->user()->username}}</a></li>
      <li><a href="{{ route('logout') }}" >Odjavi se</a></li>
    @endauth
    @guest
      <li><a href="{{ route('register')}}">Registracija</a></li>
      <li><a href="{{ route('login') }}">Ulogujte se</a></li>
    @endguest
  </ul>
</nav>
