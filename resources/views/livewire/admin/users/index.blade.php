<div class="flex flex-col p-6 w-full">


  <!-- Filters -->
  <div class="flex flex-col md:flex-row w-full justify-around">
    <!-- Sort-->
    <div class="flex flex-col">
      <p>Sortiraj po</p>

      <div class="flex flex-row justify-between md:justify-start">
        <select class="" name="sortby" wire:model="sort_by" wire:change="resetPage">
          <option value="created_at">Datumu kreiranja</option>
          <option value="username">Korisničkom Imenu</option>
          <option value="email">E-mail-u</option>
        </select>
        <select class="ml-1" name="order" wire:model="sort_direction" wire:change="resetPage">
          <option value="ASC">Rastuće</option>
          <option value="DESC">Opadajuće</option>
        </select>
      </div>

    </div>
    <!-- Category -->
    <div class="flex flex-col">
      <p>Rola</p>
      <select class="" name="role" wire:model="role">
        <option value="">Sve</option>
        <option value="admin">Administrator</option>
        <option value="client">Klijent</option>
      </select>
    </div>

    <!-- Search -->
    <form wire:submit.prevent class="relative pt-3">
      <!-- Search Submit-->
      <button class="absolute right-2 pt-1 hover:text-yellow-400 z-10" type="submit">
        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
      </button>
      <!-- End search submit -->
      <!-- Search bar -->
      <input type="text" name="searchBar" placeholder="Ime, Korisničko ime ili Email"
      wire:model="search_query"
      class="b-white border border-gray-800 text-black rounded-3xl p-1 w-64">
      <!-- End search bar -->
    </form>
    <!--End Search -->

  </div>
  <!-- End filters -->

  <!-- Users list -->
  <div class="flex flex-1 flex-col w-full items-center mt-6">
    @foreach ($users as $user)
      <!-- User -->
      <div class="flex md:flex-row flex-col justify-evenly w-full m-auto px-6 md:px-0 py-2 border-b border-black">
        <div class="w-full"><p>Korisničko ime: </p> <p class="font-bold">{{$user->username}}</p></div>
        <div class="w-full"><p>Ime i prezime: </p> <p class="font-bold">{{$user->name}}</p></div>
        <div class="w-full"><p>Email: </p> <p class="font-bold">{{$user->email}}</p></div>
        <div class="w-1/2 "><p>Rola: </p> <p class="font-bold">{{$user->role}}</p></div>
        <!-- Actions -->
        <div class="md:w-1/2 flex flex-row justify-around items-center">
          <a href="#" wire:click.prevent="$emit('edit',({{$user}}))" class="fa-solid fa-pen"></a>
          <a href="#" wire:click.prevent="delete({{$user}})" class="fa-solid fa-xmark fa-lg"></a>
        </div>
        <!-- End actions -->
      </div>
      <!-- End user -->
    @endforeach
    <div class="text-center md:w-1/2">
      {{$users->links()}}
    </div>
  </div>
  <!-- End users list-->

</div>
