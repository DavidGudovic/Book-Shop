<div x-data="{ showFilters: true, showSearchBar: false }">

  <!-- Fixed elements -->
  <!-- Search -->
    <!-- Magnifying glass icon-->
  <button class="fixed top-20 right-6 z-10 pt-2" type="button"
          x-on:click="showSearchBar = !showSearchBar">
    <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
  </button>
    <!--End icon-->
    <!--Hidden search bar-->
  <input type="text" name="searchBar" placeholder="Pretražite po imenu knjige"
         x-show="showSearchBar" x-cloak
         class="fixed top-20 right-4 b-white border-2 border-gray-800 text-black rounded-3xl p-2 w-64">
    <!-- End search bar -->
  <!--End Search -->

  <!-- Hamburger menu -->
  <button class="fixed top-20 left-6" type="button"
          x-on:click="showFilters = !showFilters"
          @click="$nextTick(() => showFilters ? window.scrollTo(0,0) : true)">
    <i class="fa-solid fa-bars fa-2xl" :class="{'rotate-90 inline-block': showFilters}"></i>
    <p x-show="!showFilters" class="text-opacity-70">Filteri<p>
  </button>
  <!-- End hamburger menu -->
  <!--End fixed elements-->

  <!-- Filters Responsive Form -->
  <form wire:submit.prevent="submit" class="flex flex-col gap-6 border-2 border-gray-800 p-6 min-w-[250px]"
      x-show="showFilters" x-transition.opacity x-ref="filters" >
    <p class="font-bold text-center">Filteri</p>
    <!--Fiction-->
    <div class="flex flex-col ">
      <p class="text-opacity-70 text-black text-sm">Beletristika</p>
      @foreach($fiction_categories as $category)
        <div class="">
          <input wire:model="category_list.{{$category->id}}" type="checkbox"  name="{{$category->id}}" @if($category_list[$category->id]) checked @endif> {{$category->name}}
        </div>
      @endforeach
    </div>
    <!--End Fiction-->
    <!--NonFiction-->
    <div class="flex flex-col ">
      <p class="text-opacity-70 text-black text-sm">Popularna nauka</p>
      @foreach($nonFiction_categories as $category)
        <div class="">
          <input wire:model="category_list.{{$category->id}}" type="checkbox" name="{{$category->id}}" @if($category_list[$category->id]) checked @endif> {{$category->name}}
        </div>
      @endforeach
    </div>
    <!--End NonFiction-->
    <!-- price range -->
    <div class="flex flex-col gap-2">
      <p class="text-opacity-70 text-black text-sm">Maksimalna cena</p>
      <input wire:model="price_range" type="range" min="1" max="10000" oninput="this.nextElementSibling.value = this.value + ' RSD'">
      <output>{{$price_range ? $price_range . ' RSD' : ""}}</output>
    </div>
    <!-- End price range -->
    <!-- Actions -->
    <div class="flex flex-col gap-2">
      <input type="submit" value="Primeni filtere"
       class="border-2 border-black bg-black text-white p-1 rounded-xl hover:text-yellow-400">
      <input wire:click.prevent="resetFilter" type="reset" value="Resetuj filtere"
      class="border-2 text-black border-black p-1 rounded-xl hover:text-yellow-400">
    </div>
    <!-- End actions-->
  </form>
    <!-- End filters form -->
  </div>
