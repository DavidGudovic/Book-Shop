<div class="flex flex-col p-6 border border-black w-full">


  <!-- Filters -->
  <div class="flex flex-col md:flex-row w-full justify-around">
    <!-- Sort-->
    <div class="flex flex-col">
      <p>Sortiraj po</p>

      <div class="flex flex-row justify-between md:justify-start">
        <select class="" name="sortby">
          <option value="">Datumu dodavanja</option>
          <option value="">Nazivu</option>
          <option value="">Oceni</option>
        </select>
        <select class="ml-1" name="order">
          <option value="">Rastuće</option>
          <option value="">Opadajuće</option>
        </select>
      </div>

    </div>
    <!-- Category -->
    <div class="flex flex-col">
      <p>Status</p>
      <select class="" name="">
        <!-- Status filters -->
        <option value="0">Sve</option>
        <option value="{{Reclamation::STATUS_PENDING}}">Obrađuje se</option>
        <option value="{{Reclamation::STATUS_DENIED}}">Odbijena</option>
        <option value="{{Reclamation::STATUS_REFUNDED}}">Refundirana</option>
      </select>
    </div>

    <!-- Search -->
    <form wire:submit.prevent="search" class="relative pt-3">
      <!-- Search Submit-->
      <button class="absolute right-2 pt-1 hover:text-yellow-400 z-10" type="submit">
        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
      </button>
      <!-- End search submit -->
      <!-- Search bar -->
      <input type="text" name="searchBar" placeholder="Knjiga, Autor ili ISBN"
      wire:model="search_query"
      class="b-white border border-gray-800 text-black rounded-3xl p-1 w-64">
      <!-- End search bar -->
    </form>
    <!--End Search -->

  </div>
  <!-- End filters -->





</div>
