<div class="flex flex-col">
  <!-- Fixed -->
  <!-- Search loading indicator -->
  <div wire:loading class="fixed m-auto right-0 left-0 top-32 h-16 w-16">
    <img src="{{URL('/images/util/loading.gif')}}" alt="">
  </div>
  <!-- End loading indicator -->
  <!-- End fixed-->
  <!-- List of Books -->
  <div class="flex flex-row flex-wrap gap-20 justify-center">
    @forelse($book_list as $book)
      <!-- Book -->
      <div class="flex flex-col gap-2">
        <img src="{{URL('/images/'. $book->image)}}" class="h-[420px] w-[270px]">
        <p class="font-semibold">{{$book->title}}</p>
        <!-- Authors -->
        <p>
          @foreach($book->authors as $author)
            {{$author->name}}
            @if(!$loop->last)
              ,
            @endif
          @endforeach
        </p>
        <!-- End Authors -->
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

        <div class="flex justify-between items-center mt-3">
          <a href="{{route('books.show', $book)}}" class="rounded-3xl bg-black text-white px-2 py-1" name="button">Više informacija</a>
          <p class="text-lg">{{$book->price}} RSD</p>
          <a href="" wire:click.prevent="addToCart({{$book->id}})"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
      <!--End book -->
    @empty
      <img src="{{URL('images/util/noresult.jpg')}}" alt="Nema rezultata pretrage">
    @endforelse
  </div>
  <!-- End of list-->
</div>
