<div x-data="{ showFilters: true }">
  <!-- Hamburger menu -->
  <button class="fixed top-16 left-4" type="button"
          x-on:click="showFilters = !showFilters">
    <i class="fa-solid fa-bars fa-2xl" :class="{'rotate-90 inline-block': showFilters}"></i>
  </button>
  <!-- End hamburger menu -->
  <!-- Filters list -->
  <div class="flex flex-col gap-6 border-2 border-gray-800 p-6 min-w-[250px]"
      x-show="showFilters" x-transition.opacity x-ref="filters" >
    <p class="font-bold text-center">Filteri</p>
    <!--Fiction-->
    <div class="flex flex-col ">
      <p class="text-opacity-70 text-black text-sm">Beletristika</p>
      @foreach(['Klasici','Horor','Misterija','Naučna fantastika'] as $category)
        <div class="">
          <input type="checkbox" name=""> {{$category}}
        </div>
      @endforeach
    </div>
    <!--End Fiction-->
    <!--NonFiction-->
    <div class="flex flex-col ">
      <p class="text-opacity-70 text-black text-sm">Popularna nauka</p>
      @foreach(['Infromacione tehnologije','Psihologija','Filozofija','Fizika'] as $category)
        <div class="">
          <input type="checkbox" name=""> {{$category}}
        </div>
      @endforeach
    </div>
    <!--End NonFiction-->
    <!-- price range -->
    <div class="flex flex-col gap-2">
      <p class="text-opacity-70 text-black text-sm">Maksimalna cena</p>
      <input type="range" value="" min="1" max="10000" oninput="this.nextElementSibling.value = this.value + ' RSD'">
      <output></output>
    </div>
    <!-- end price range -->
    <!-- Actions -->
    <div class="flex flex-col gap-2">

      <button wire:click="$emit('filter')" type="button" class="border-2 border-black bg-black text-white p-1 rounded-xl">Primeni filtere</button>
      <button wire:click="$emit('filter')" type="button" class="border-2 text-black border-black p-1 rounded-xl">Resetuj filtere</button>

    </div>
    <!-- End actions--></div>
    <!-- End filters list -->
  </div>
