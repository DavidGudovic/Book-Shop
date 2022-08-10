<nav class="sticky top-0 max-h-16 bg-black text-white">
  <!-- Nav items -->
  <ul class="flex items-center justify-around w-full py-4">
    <!-- Generic nav links -->
    <li><a href="{{ route('home') }}" >Početna</a></li>

    <!-- Profile dropdown -->
    <div x-data="{ open: false }" x-on:click.outside="open = false">
      <button x-on:click="open = !open">
        Ponuda <i class="fa-solid fa-caret-down" :class="{'rotate-180 inline-block': open}"></i>
      </button>
      <!-- hidden menu -->
      <ul class="absolute flex flex-col gap-4 rounded-lg bg-white text-black p-4 mt-4 " x-show="open" x-transition.opacity>
        <li><a href="{{ route('books.index') }}" >Cela ponuda</a></li>
        <li><a href="{{ route('books.index', ['category' => 'fiction']) }}">Beletristika</a></li>
        <li><a href="{{ route('books.index', ['category' => 'nonFiction']) }}">Popularna nauka</a></li>
      </ul>
      <!-- end hidden menu -->
    </div>
    <!-- End profile dropdown -->
    <!-- End generic -->
    @admin
    <!-- Admin specific links -->
    <li><a href="">Administracija</a></li>
    <!-- End admin specific links -->
    @endadmin
    @auth
      <!-- User specific links -->
      <!-- Profile dropdown -->
      <div x-data="{ open: false }" x-on:click.outside="open = false">
        <button x-on:click="open = !open">
          Profil <i class="fa-solid fa-caret-down" :class="{'rotate-180 inline-block': open}"></i>
        </button>
        <!-- hidden menu -->
        <ul class="absolute flex flex-col gap-4 rounded-lg bg-white text-black p-4 mt-4 " x-show="open" x-transition.opacity>
          <li><a href="{{route('users.show', auth()->user())}}">Informacije</a></li>
          <li><a href="">Narudžbine</a></li>
          <li><a href="{{route('logout')}}">Odjavi se</a></li>
        </ul>
        <!-- end hidden menu -->
      </div>
      <!-- End profile dropdown -->
      <li><a href="" >Korpa</a></li>
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
