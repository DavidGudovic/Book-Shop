<nav class="sticky top-0 max-h-16 bg-black text-white z-40">
  <!-- Nav items -->
  <ul class="flex items-center justify-around w-full py-4">
    <!-- Generic nav links -->
    <li><a href="{{ route('home') }}" >Početna</a></li>

    <!-- Profile dropdown -->
    <div x-data="{ open: false }" x-on:click.outside="open = false">
      <button x-on:click="open = !open" class="hover:text-yellow-400">
        Ponuda <i class="fa-solid fa-caret-down" :class="{'rotate-180 inline-block': open}"></i>
      </button>
      <!-- hidden menu -->
      <ul class="absolute flex flex-col gap-4 rounded-lg bg-white text-black p-4 mt-4 " x-cloak x-show="open" x-transition.opacity>
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
        <button x-on:click="open = !open" class="hover:text-yellow-400">
          Profil <i class="fa-solid fa-caret-down" :class="{'rotate-180 inline-block': open}"></i>
        </button>
        <!-- hidden menu -->
        <ul class="absolute flex flex-col gap-4 rounded-lg bg-white text-black p-4 mt-4 " x-cloak x-show="open" x-transition.opacity>
          <li><a href="{{route('users.show', auth()->user())}}">Informacije</a></li>
          <li><a href="">Narudžbine</a></li>
          <li><a href="{{route('logout')}}">Odjava</a></li>
        </ul>
        <!-- end hidden menu -->
      </div>
      <!-- End profile dropdown -->
      <!-- Alpine JS event -> Livewire Modal -->
      <li><button class="hover:text-yellow-400" x-data="{}" x-on:click="window.livewire.emitTo('cart-modal', 'show')">Korpa</button></li>
      <!-- End Alpine JS event -->
      <!-- End user links -->
    @endauth
    @guest
      <!-- Authentication links -->
      <li><a href="{{ route('register')}}">Registracija</a></li>
      <li><a href="{{ route('login') }}">Prijava</a></li>
      <!-- End Authentication -->
    @endguest
  </ul>
  <!-- End nav items -->
</nav>
