<nav>
  <div class="flex justify-between bg-white h-30 sticky">
    <!-- Right nav links -->

    <ul class="flex items-center  p-3 w-1/3">
      <li><a href="" class="p-3">Početna</a></li>
      <li><a href="" class="p-3">Ponuda</a></li>
    </ul>
    <!-- End right nav links -->
    <!-- Nav brand centered-->
    <p class='text-center p-3 w-1/3 font-bold text-2xl'>Knjižara Karamazov</p>
    <!-- End brand -->
    <!-- Left nav links -->
    <ul class="flex justify-end items-center p-3 w-1/3 ">

      @auth
        <li><a href="" class="p-3">{{auth()->user()->username}}</a></li>
        <li><a href="{{ route('logout') }}" class="p-3">Odjavi se</a></li>
      @endauth

      @guest
        <li><a href="{{ route('register') }}" class="p-3">Registracija</a></li>
        <li><a href="{{ route('login') }}" class="p-3">Ulogujte se</a></li>
      @endguest

    </ul>
    <!-- End left nav links -->
  </div>
