<div x-data="{ showFilters: true, showSearchBar: false }">

  <!-- Fixed elements -->

  <!-- Search -->

    <!-- Closed search icons-->
  <button class="fixed top-20 right-6 z-10 pt-2 hover:text-yellow-400" type="button"
          x-on:click="showSearchBar = true"
          x-show="!showSearchBar">
          <div class="flex-col md:flex-row">
            <i class="fa-solid fa-arrow-left fa-2xl"></i>
            <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
          </div>
  </button>
  <!-- End closed search icons -->

  <!-- Search form open -->
  <form wire:submit.prevent="search">
    <!-- Search Submit-->
    <button class="fixed top-20 right-6 z-10 pt-2 hover:text-yellow-400" type="submit"
            x-on:click="showFilters = false"
            @click="$nextTick(() => window.scrollTo(0,0))"
            x-show="showSearchBar">
      <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
    </button>
    <!-- End search submit -->
      <!--Hidden search bar-->
      <!-- Close icon-->
      <a href="" class="fa-solid fa-arrow-right fa-2xl fixed top-24 pt-2 right-72 "
       x-show="showSearchBar" x-on:click.prevent="showSearchBar = !showSearchBar"></a>
       <!-- End close icon -->
       <input type="text" name="searchBar" placeholder="Knjiga, Autor ili ISBN"
           x-show="showSearchBar"
           x-cloak x-transition-opacity
           wire:model="searchQuery"
           class="fixed top-20 right-4 b-white border-2 border-gray-800 text-black rounded-3xl p-2 w-64">
      <!-- End search bar -->
  </form>
  <!-- End search open -->

  <!--End Search -->

  <!-- Open/Close filters -->
  <button class="fixed top-20 left-6 pt-2 hover:text-yellow" type="button"
          x-on:click="showFilters = !showFilters"
          @click="$nextTick(() => showFilters ? window.scrollTo(0,0) : true)">
      <i class="fa-solid fa-sliders fa-2xl" :class="{'rotate-90 inline-block': showFilters}"></i>
      <p x-show="!showFilters" class="text-opacity-70">Filteri</p>
  </button>
  <!-- End open/close filters-->
  <!--End fixed elements-->

  <!-- Filters Responsive Form -->
  <form wire:submit.prevent="submit" class="flex flex-col gap-6 border-2 border-gray-800 p-6 min-w-[250px]"
      x-show="showFilters" x-transition.opacity x-ref="filters" >
      <div class="flex flex-row justify-center">
        <p class="font-bold text-center">Filteri</p>
        <div wire:loading wire:target="submit, resetFilter" class="w-8 h-8">
          <img src="{{URL('/images/loading.gif')}}" alt="">
        </div>
      </div>

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
