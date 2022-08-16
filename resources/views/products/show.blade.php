@extends('templates.app')

@section('content')
  <!-- Wrapper for book show -->
  <div class="flex flex-col gap-4 px-2 md:px-44">
    <a href="{{route('books.index')}}" class="font-bold underline py-6 mt-4 w-36"><< Vidi sve knjige</a>
    <!-- Book -->
    <div x-data='{quantity: 1}' class="flex flex-col md:flex-row border-2 border-black px-4 md:pr-0 py-6">
      <!-- Info -->
      <div class="flex flex-col border-b border-black pb-4 px-6 md:px-0 md:flex-row md:pb-0 md:w-1/2 md:min-w-[500px] md:border-b-0 md:border-r ">
        <img src="{{URL('/images/' . $book->image)}}" alt="Cover image of {{$book->title}} "
        class="h-full max-h-[600px] max-w-[400px] w-full md:h-[400px] md:w-[250px] mb-3 md:mb-0 md:mr-6">
        <div class="flex flex-col justify-between gap-3 md:gap-6">
          <p class="font-bold text-xl">{{$book->title}}</p>
          <!--Group Author, Isbn, Category -->
          <div class="flex flex-col gap-1">
            <p>Autor:
              @foreach($book->authors as $author)
                {{$author->name}}
                @if(!$loop->last)
                  ,
                @endif
              @endforeach
            </p>
            <p>ISBN: {{$book->isbn}}</p>
            <p>Kategorija: {{$book->category->name}}</p>
          </div>
          <!-- End group -->

          <!--Group Score, Price, Quantity, Store -->
          <div class="flex flex-col gap-3">
            <!-- Score -->
            <div class="flex flex-row gap-5">
              @if($book->average_score > 0)
                @foreach(range(1, $book->average_score) as $index)
                  <i class="fa-solid fa-star"></i>
                @endforeach
              @else
                <p class="text-gray-500 text-sm"> Još uvek nema ocena </p>
              @endif
            </div>
            <!-- End score -->
            <p>Cena: {{$book->price}} RSD</p>

            <div class="flex flex-row gap-4">
              <p class="align-middle">Količina:</p>
              <!-- Quantity buttons -->
              <a href="" x-on:click.prevent="quantity > 1 ? quantity-- : false" class="fa-solid fa-angle-left pt-1"  :class="quantity == 1 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
              <span x-text="quantity" class="w-4 text-center"></span>
              <a href="" x-on:click.prevent="quantity < 100 ? quantity++ : false" class="fa-solid fa-angle-right pt-1"  :class="quantity == 100 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
              <!-- End quantity buttons -->
            </div>
            <a href="#" x-on:click.prevent="window.livewire.emit('addToCart', {{$book->id}}, quantity)" class="pl-6 py-1 rounded-xl bg-black text-white w-44">Dodaj u korpu <i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <!--End group -->
        </div>
      </div>
      <!-- End info-->
      <!-- Synopsis-->
      <div class="flex justify-center items-center p-6 md:w-1/2 md:min-w-[500px] overflow-hidden">
        <p class="animate-apear-from-top md:animate-apear-from-left">{{$book->synopsis}}</p>
      </div>
      <!-- End synopsis-->
    </div>
    <!-- End Book -->

    <!-- Recensions -->
    <div class="mb-20 border-2 border-black pb-4">
      <x-heading>
        Recenzije
      </x-heading>

      <!-- Reviews-->
      <livewire:book-reviews :book='$book' />
      <!-- Reviews-->

    </div>
    <!-- End recensions -->

    <!-- Modal -->
    @auth
       <livewire:review-modal :book='$book'/>
     @endauth
    <!-- End modal -->

  </div>
  <!-- End wrapper -->
@endsection
