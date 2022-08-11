<div class="flex flex-col">
  <!-- List of Books -->
  <div class="flex flex-row flex-wrap gap-20 justify-center">
    @forelse($book_list as $book)
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
        <div class="flex justify-between items-center mt-3">
          <a href="{{route('books.show', $book)}}" class="rounded-3xl bg-black text-white px-2 py-1" name="button">Više informacija</a>
          <p class="text-lg">{{$book->price}} RSD</p>
          <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
    @empty
      <p class="text-6xl font-bold text-black">Nema proizvoda</p>
    @endforelse
  </div>
  <!-- End of list-->
</div>
