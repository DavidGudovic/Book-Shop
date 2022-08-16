<div>
  <x-modal wire:model="showModal">
    <!-- Reclamation Modal -->
    <div class="flex flex-col bg-white rounded-lg transform p-6 pb-4 z-50 w-full h-[430px] md:min-h-0 md:w-1/2 md:h-3/4">

      <x-close-button/>

      @if(!empty($order))
        @reclamated($order)
        <!-- Redirect to reclamations -->
        <div class="flex flex-1 flex-col justify-center items-center">
          @if(session()->has('message'))
            <p class="text-green-400 text-center p-2">{{session('message')}}</p>
          @else
            <p class="text-black text-center p-4">Već ste reklamirali ovu narudžbinu</p>
          @endif
           <a href="{{route('user.reclamations.index', auth()->user())}}" class="underline text-black">Pogledajte vaše reklamacije>></a>
        </div>
          <!--End redirect -->
        @else
          <div class="flex flex-col p-4 md:px-20 gap-6">
            <p class="font-bold text-xl text-center">Reklamacija narudžbine: U{{auth()->id()}}-O{{$order->id}}</p>

            <!-- Reclamation -->
            <div class="flex flex-col p-2 gap-2 border-t border-b border-black">

              <!-- Text -->
              <div class="flex flex-col gap-1"
                x-data="{ count: 0 }"
                x-init="count = $refs.counted.value.length">
                <textarea class="border border-black resize-none" x-ref="counted" x-on:keyup="count = $refs.counted.value.length"
                name="text" rows="8" cols="80" maxlength="512" placeholder="Unesite tekst vaše reklamacije" wire:model.defer="text"></textarea>
                <!-- Char count -->
                <div class="text-gray-500 text-sm text-center" :class="count > 450 ? 'text-red-400' : '' ">
                  <span x-html="count" ></span> <span>/</span> <span x-html="$refs.counted.maxLength" ></span>
                </div>
                <!-- End char count -->
              </div>
              <!-- End text -->
            </div>
            <!--End reclamation -->

            <!-- Actions -->
            <div class="flex flex-row gap-4 justify-center">
                <a href="#" wire:click.prevent="makeReclamation" class="text-center rounded-xl w-48 bg-black text-white p-1">Pošalji reklamaciju</a>
            </div>
            <!-- End actions -->
          </div>
        @endreclamated
      @endif

    </div>
    <!-- Reclamation Modal -->
  </x-modal>
</div>
