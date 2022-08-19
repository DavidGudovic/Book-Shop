<div class="flex flex-col p-6 px-12 w-full h-full">
  <x-loading-indicator/>
  <!-- Filters -->
  <div class="flex flex-col md:flex-row w-full justify-around">

    <!-- Sort-->
    <div class="flex flex-col">
      <p>Sortiraj po</p>

      <div class="flex flex-row justify-between md:justify-start">
        <select wire:model="sort_by" wire:change="sort" class="" name="sortby">
          <option value="created_at">Datumu dodavanja</option>
          <option value="title">Nazivu</option>
          <option value="average_score">Oceni</option>
        </select>
        <select wire:model="sort_direction" wire:change="sort" class="ml-1" name="order">
          <option value="ASC">Rastuće</option>
          <option value="DESC">Opadajuće</option>
        </select>
      </div>

    </div>
    <!-- Category -->
    <div class="flex flex-col">
      <p>Kategorija</p>
      <select wire:model="category" wire:change="filter" class="" name="category">
        <option value="0">Sve</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
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

  <!-- Products -->
  <div class="flex flex-col p-2  gap-2 mt-4 items-center ">
    @forelse($books as $book)
      <!-- Book -->
      <div class="@if(!$loop->last)border-b border-black @endif w-full flex flex-col md:flex-row py-4">
        <!-- Title, Isbn -->
        <div class="flex flex-col justify-between w-full md:py-8 ">
          <p><span class="font-bold">Naslov:</span>   {{$book->title}}</p>
          <p><span class="font-bold">ISBN: </span> {{$book->isbn}}</p>
          <p><span class="font-bold">Cena: </span> {{$book->price}} RSD</p>
        </div>
        <!-- Authors, Category -->
        <div class="flex flex-col justify-between w-full md:py-8">
          <!-- Authors -->
          <p> <span class="font-bold"> Autori: </span>
            @foreach($book->authors as $author)
              {{$author->name}}
              @if(!$loop->last)
                ,
              @endif
            @endforeach
          </p>
          <!-- End Authors -->
          <p><span class="font-bold"> Kategorija: </span> {{$book->category->name}}</p>
          <p><span class="font-bold"> Prosečna ocena: </span> {{$book->average_score}}</p>
        </div>
        <!-- Recommended -->
        <div class="flex flex-col justify-center items-center">
          <p class="font-bold">Preporučena</p>
          <input type="checkbox" @if($book->isRecommended) checked @endif wire:change="flipRecommended({{$book}})">
          </div>
          <!-- Image -->
          <div class="flex flex-col justify-center items-center w-full h-full mt-4 md:mt-0">
            <img src="{{URL('/images/' . $book->image)}}" alt=""  width="200px" height="400px">
          </div>
          <!-- Actions -->
          <div class="flex flex-row md:flex-col justify-center items-center gap-12 mt-4 md:mt-0">
            <a href="#" wire:click.prevent="delete({{$book->id}})" class="fa-solid fa-xmark fa-xl"></a>
            <a href="#" wire:click.prevent="edit({{$book}})" class="fa-solid fa-pen"></a>
            <a href="{{route('books.show',$book->id)}}" class="fa-solid fa-info fa-xl"></a>
          </div>

        </div>
        <!-- End Book -->
      @empty
        <img src="{{URL('images/util/noresult.jpg')}}" alt="Nema rezultata pretrage" class="w-1/2">
      @endforelse
    </div>
    <!-- End products-->

  </div>
