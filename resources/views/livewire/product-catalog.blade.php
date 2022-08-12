<div class="flex flex-col">
  <!-- Fixed -->
  <!-- Search loading indicator -->
  <div wire:loading class="fixed top-28 pt-2 right-10 h-16 w-16">
    <img src="{{URL('/images/loading.gif')}}" alt="">
  </div>
  <!-- End loading indicator -->
  <!-- End fixed-->
  <!-- List of Books -->
  <div class="flex flex-row flex-wrap gap-20 justify-center">
    @forelse($book_list as $book)
      <!-- Book -->
      <div class="flex flex-col gap-2">
        <img src="{{URL('/images/'. $book->image)}}" class="h-[420px] w-[270px]">
        <p class="font-semibold">{{$book->name}}</p>
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
          @foreach(range(1,5) as $index)
                <i class="fa-solid fa-star"></i>
          @endforeach
        </div>

        <!-- End score -->
        <div class="flex justify-between items-center mt-3">
          <a href="{{route('books.show', $book)}}" class="rounded-3xl bg-black text-white px-2 py-1" name="button">Više informacija</a>
          <p class="text-lg">{{$book->price}} RSD</p>
          <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
      <!--End book -->
    @empty
      <img src="{{URL('images/noresult.jpg')}}" alt="Nema rezultata pretrage">
    @endforelse
  </div>
  <!-- End of list-->
</div>
