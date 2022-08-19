<div>
  <x-modal wire:model="showModal">
    <div class="flex flex-col bg-white rounded-lg transform p-6 z-50 min-h-[500px]  w-full h-3/4 md:w-1/2"
         x-show="showModal">

        <x-close-button/>

    @reviewed($book)
    <!-- Change review  -->
    <div class="flex flex-col p-4 md:px-20 gap-6">
      <p class="font-bold text-xl text-center">Vaša recenzija</p>

      <!-- Review -->
      <div class="flex flex-col p-2 gap-2 border-t border-b border-black">
        <p class="font-bold text-center">{{$book->title}}</p>
        <!-- Score -->
        <div class="flex flex-row gap-3 mt-4"
            x-data="{score: @entangle('score').defer}">
          <p>Ocena: </p>
          <a href="" x-on:click.prevent="score > 1 ? score-- : false" class="fa-solid fa-angle-left pt-1"  :class="score == 1 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
          <span x-text="score" class="w-4 text-center"></span>
          <a href="" x-on:click.prevent="score < 5 ? score++ : false" class="fa-solid fa-angle-right pt-1"  :class="score == 5 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
          <input type="hidden" x-model="score" wire:model="score">
          <i class="fa-solid fa-star pt-0.5" :class="score > 0 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 1 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 2 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 3 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 4 ? '' : 'hidden' "></i>
        </div>
        <!-- End score buttons -->

        <!-- Text -->
        <div class="flex flex-col gap-1"
          x-data="{ count: 0 }"
          x-init="count = $refs.counted.value.length">
          <textarea class="border border-black resize-none" x-ref="counted" x-on:keyup="count = $refs.counted.value.length" name="text" rows="8" cols="80" maxlength="512" value="" wire:model.defer="text">{{$review->text}}</textarea>
          <!-- Char count -->
          <div class="text-gray-500 text-sm text-center" :class="count > 450 ? 'text-red-400' : '' ">
            <span x-html="count" ></span> <span >/</span> <span x-html="$refs.counted.maxLength" ></span>
          </div>
          <!-- End char count -->
        </div>
        <!-- End text -->

      </div>
      <!--End review -->
      <!-- Actions -->
      <div class="flex flex-row gap-4 justify-center">
          <a href="#" wire:click.prevent="update" class="text-center rounded-xl w-48 bg-black text-white p-1">Izmeni recenziju</a>
          <a href="#" wire:click.prevent="delete" class="text-center rounded-xl w-48 bg-red-500 text-white p-1">Izbriši recenziju</a>
      </div>
      <!-- End actions -->
    </div>
	  <!-- End change review -->
    @else
    <!-- Make review -->
    <div class="flex flex-col p-4 md:px-20 gap-6">
      <p class="font-bold text-xl text-center">Vaša recenzija</p>

      <!-- Review -->
      <div class="flex flex-col p-2 gap-2 border-t border-b border-black">
        <p class="font-bold text-center">{{$book->title}}</p>
        <!-- Score -->
        <div class="flex flex-row gap-3 mt-4"
            x-data="{score: @entangle('score').defer}">
          <p>Ocena: </p>
          <a href="" x-on:click.prevent="score > 1 ? score-- : false" class="fa-solid fa-angle-left pt-1"  :class="score == 1 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
          <span x-text="score" class="w-4 text-center"></span>
          <a href="" x-on:click.prevent="score < 5 ? score++ : false" class="fa-solid fa-angle-right pt-1"  :class="score == 5 ? 'text-gray-400 hover:text-gray-400' : 'hover:text-yellow-400'"></a>
          <input type="hidden" x-model="score" wire:model="score">
          <i class="fa-solid fa-star pt-0.5" :class="score > 0 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 1 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 2 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 3 ? '' : 'hidden' "></i>
          <i class="fa-solid fa-star pt-0.5" :class="score > 4 ? '' : 'hidden' "></i>
        </div>
        <!-- End score buttons -->

        <!-- Text -->
        <div class="flex flex-col gap-1"
          x-data="{ count: 0 }"
          x-init="count = $refs.counted.value.length">
          <textarea class="border border-black resize-none" x-ref="counted" x-on:keyup="count = $refs.counted.value.length" name="text" rows="8" cols="80" maxlength="512" wire:model.defer="text" ></textarea>
          <!-- Char count -->
          <div class="text-gray-500 text-sm text-center" :class="count > 450 ? 'text-red-400' : '' ">
            <span x-html="count" ></span> <span >/</span> <span x-html="$refs.counted.maxLength" ></span>
          </div>
          <!-- End char count -->
        </div>
        <!-- End text -->

      </div>
      <!--End review -->
      <!-- Actions -->
      <div class="text-center">
          <a href="#" wire:click.prevent="create" class="text-center rounded-xl w-48 bg-black text-white p-1">Ostavi recenziju</a>
      </div>
      <!-- End actions -->
    </div>
  	<!-- End make review -->
    @endreviewed

    </div>
  </x-modal>
</div>
