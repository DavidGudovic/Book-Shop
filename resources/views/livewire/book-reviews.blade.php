<div class="flex flex-col items-center justify-center gap-4 px-3 md:px-20">
  @forelse($reviews as $review)
    <div class="flex flex-col gap-5 border-b border-black w-full">
      <p>{{$review->user->name}}</p>
      <!-- Score -->
      <div class="flex flex-row gap-5">
        @if($review->score > 0)
          @foreach(range(1, $review->score) as $star)
            <i class="fa-solid fa-star"></i>
          @endforeach
        @else
          <p class="text-gray-500 text-sm"> Još uvek nema ocena </p>
        @endif
      </div>
      <!-- End score -->
      <p class="mb-4">{{$review->text}}</p>
    </div>
  @empty
    <img src="{{URL('/images/util/noreviews.jpg')}}" alt="" class="w-[400px] md:w-[500px] my-4">
  @endforelse
  {{ $reviews->links() }}
</div>
