<div x-data="{ showModal: @entangle('showModal') }" x-show="showModal" x-trap.noscroll="showModal" x-on:keydown.escape.window="showModal = false" x-cloak class="flex justify-center fixed inset-0 px-4 py-6 md:py-6 z-50">

  <!-- Modal Background -->
  <div x-show="showModal" class="fixed inset-0 transform bg-gray-500 opacity-70 " x-on:click="showModal=false"></div>
  <!-- End modal background-->

  <!-- Modal body -->
  <div class=" bg-white rounded-lg transform p-6 pb-4 z-50 w-full h-full min-h-[600px] md:min-w-min md:w-2/5">
    <x-close-button/>
    <!-- Form -->
    <form class="flex flex-col gap-2" wire:submit.prevent="submit">
      <p class="text-center font-bold text-2xl hidden md:inline-block">Izmeni proizvod</p>
      <!-- Authors -->
      <div class="flex flex-col flex-wrap w-full">
        <span class="font-bold"> Autori, razdvojeni zarezom: </span>
        <input type="text" class="border border-black @error('authors') border-red-500 @enderror" placeholder="Autor 1, Autor 2, Autor 3, ..." wire:model="authors">
      </div>
      <!-- End authors -->

      <!-- Information-->
      <div class="flex flex-col md:flex-row md:gap-10">

        <!-- title, isbn -->
        <div class="flex flex-col gap-2 flex-1 justify-evenly">
          <!-- title -->
          <div class="flex flex-row justify-between">
            <p class="font-bold w-16"> Naslov: </p>
            <input type="text" class="border border-black w-full @error('book.title') border-red-500 @enderror" wire:model="book.title">
          </div>
          <!-- Isbn-->
          <div class="flex flex-row justify-between">
            <p class="font-bold w-16"> ISBN: </p>
            <input type="text" class="border border-black w-full @error('book.isbn') border-red-500 @enderror" wire:model="book.isbn">
          </div>
          <!-- Price -->
          <div class="flex flex-row justify-between">
            <p class="font-bold w-16"> Cena: </p>
            <input type="number" class="border border-black @error('book.price') border-red-500 @enderror" wire:model="book.price">
            <p>RSD</p>
          </div>
          <!-- Category -->
          <div class="flex flex-row justify-between">
            <p class="font-bold w-16"> Kategorija: </p>
            <select class="@error('book.category_id') border-red-500 @enderror" name="category" wire:model="book.category_id">
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <!--- End title, isbn -->

        <!-- Image -->
        <div class="flex flex-col justify-center items-center">
          <!-- Action, loading -->
          <div class="">
            <div class="flex flex-row">
              <label for="hidden_button_edit" class="underline cursor-pointer hover:text-yellow-400">Izmeni</label>
              <img wire:loading wire:target="image" src="{{URL('/images/util/loading.gif')}}" alt="loading indicator" class="h-8 w-8">
            </div>
            <input type="file" wire:model="image" id="hidden_button_edit" hidden>
          </div>
          <!-- End action-->
          @if($book)
            <img src="{{$image ? $image->temporaryUrl() : URL('/images/' . $book->image)}}"  width="150" height="250" alt="nova fotografija" class="@error('image') border-red-500 @enderror">
          @endif
        </div>
        <!-- End image -->
      </div>
      <!-- End information -->

      <!-- Text -->
      <div class="flex flex-col gap-1" x-data="{ count: 0 }" x-init="count = $refs.counted.value.length">
        <textarea class="border border-black resize-none h-44 md:h-56 @error('book.synopsis') border-red-500 @enderror" x-ref="counted" x-on:keyup="count = $refs.counted.value.length" name="text" rows="8" cols="70" maxlength="1024" placeholder="Unesite opis knjige" wire:model='book.synopsis'></textarea>
        <!-- Char count -->
        <div class="text-gray-500 text-sm text-center" :class="count > 900 ? 'text-red-400' : '' ">
          <span x-html="count"></span> <span>/</span> <span x-html="$refs.counted.maxLength"></span>
        </div>
        <!-- End char count -->
      </div>
      <!-- End text -->

      <input type="submit" name="submit" class="text-center p-2 bg-black text-white cursor-pointer hover:text-yellow-400 " value="Sačuvaj">
    </form>
    <!-- End form-->
  </div>
  <!-- End Modal Body -->
</div>
