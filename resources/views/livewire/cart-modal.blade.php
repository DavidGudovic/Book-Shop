<div>
  <x-modal wire:model="showModal">
    <!-- Cart -->
    <div class="flex flex-col bg-white rounded-lg transform p-6 pb-4 z-50 w-full h-3/4 md:w-1/2 md:h-full"
         x-show="showModal"
         x-data="{count: @entangle('count')}">
      <!-- Close Button -->
      <a href="" class="fa-solid fa-xmark fa-xl absolute top-6 right-6"
      x-on:click.prevent="showModal = false"></a>
      <!-- End Close button -->
      <!-- Cart Heading -->
      <div class="flex flex-row justify-center items-center">
        <p class="text-2xl font-bold text-center p-3 ">Korpa</p>
        @if (session()->has('message'))
          <div>
            <p class="text-center text-green-500 mt-2">
                {{ session('message') }}
            </p>
          </div>
        @endif
          <!-- Loading indicator -->
          <img wire:loading src="{{URL('/images/util/loading.gif')}}" class="h-12 pt-2">
          <!-- end loading indicator -->
      </div>
      <!-- End Heading -->

      <!-- Cart Items -->
      <div class="flex flex-col flex-1 gap-10 items-center w-full overflow-y-auto border-b-2 border-black">
        @forelse($quantities as $id => $quantity)
          <!-- Item -->
          <div class="relative flex flex-row justify-between border-b-2 border-gray-500 w-full md:p-6">
            <!-- Left Info --->
            <div class="flex flex-col gap-2">
                <p class="font-bold md:text-2xl">{{$items[$id]->title}}</p>
                <p class="text-sm">
                  Autor:
                  @foreach($items[$id]->authors as $author)
                    {{$author->name}}
                    @if(!$loop->last)
                      ,
                    @endif
                  @endforeach
                </p>
            </div>
            <!-- End left -->
            <!-- Right info -->
            <div class="flex flex-col justify-evenly mr-8 w-20">
              <p class="text-sm text-gray-600">Količina {{$quantity}}</p>
              <p class="text-sm text-gray-600">{{$quantity * $items[$id]->price}} RSD</p>
            </div>
            <!-- End right -->
            <!-- Actions -->
            <a href="" wire:click.prevent="remove({{$id}})" class="text-gray-600 fa-solid fa-xmark absolute right-0 top-5 md:top-12 md:right-2"></a>
            <a href="" wire:click.prevent="increment({{$id}})" class="text-gray-600 fa-solid fa-angle-up absolute right-4 top-2 md:top-9 md:right-9"></a> <!-- Decrement -->
            <a href="" wire:click.prevent="decrement({{$id}})" class="text-gray-600 fa-solid fa-angle-down absolute right-4 top-8 md:top-16 md:right-9"></a>  <!-- Increment -->
            <!-- End actions -->
          </div>
          <!-- Item -->
        @empty
          <img  src="{{URL('/images/util/noresult.jpg')}}" class="w-[250px] md:w-[350px]">
        @endforelse
      </div>
      <!-- End Cart Items -->

      <!-- Cart Footer -->
      <!-- Not empty -->
      <div x-show="count >= 1 ? true : false" class="flex flex-col justify-center gap-2 items-center ">
        <p class="font-bold text-center">Ukupno:</p>
        <p class="text-center text-sm">{{$total}}</p>
        <a href="" wire:click.prevent="order" class="p-1 text-center rounded-xl bg-black text-white w-32">Naruči</a>
      </div>
      <!-- Empty -->
      <div x-show="count == 0 ? true : false" class="flex flex-col justify-center gap-2 items-center ">
        <a href="{{route('books.index')}}" class="p-1 mt-6 mb-2 text-center rounded-xl bg-black text-white w-32 ">Pogledaj ponudu</a>
      </div>
      <!-- End Cart Footer -->
    </div>
    <!-- End Cart -->
  </x-modal>
</div>
