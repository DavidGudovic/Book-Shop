<div class="">
  <!-- Actions-->
  <div class="flex flex-col md:flex-row gap-6 justify-center px-10 mb-10 md:px-0">
    <p class="pt-0.5">Sortiraj po:</p>
    <!-- Filters -->
    <div class="flex flex-row justify-between md:gap-6">

      <select class="" name="filterby" wire:model='sort_by'>
        <option value="created_at">Datumu</option>
        <option value="score">Oceni</option>
      </select>

      <select class="" name="filterdirection" wire:model='sort_direction'>
        <option value="DESC">Opadajuće</option>
        <option value="ASC">Rastuće</option>
      </select>


    </div>
    <!-- End filter -->
    @auth
      @reviewed($book)
      <a href="#" x-data="{}" x-on:click.prevent="window.livewire.emitTo('reviews.modal', 'showModal')" class="py-1 rounded-xl bg-black text-white w-full text-center md:w-40">Izmeni recenziju</a>
    @else
      <a href="#"  x-data="{}" x-on:click.prevent="window.livewire.emitTo('reviews.modal', 'showModal')" class="py-1 rounded-xl bg-black text-white w-full text-center md:w-40">Postavi recenziju</a>
      @endreviewed
    @endauth
  </div>
  <!-- End actions -->

  <div class="flex flex-col items-center justify-center gap-4 px-3 md:px-20">


       @if ($message)
         <div>
           <p class="text-center text-green-500">
               {{ $message }}
           </p>
         </div>
       @endif


    @forelse($reviews as $review)
      <div class="flex flex-col gap-5 border-b border-black w-full">
        <p>{{$review->user->username}}</p>
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
</div>
