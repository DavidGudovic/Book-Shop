<div class="flex-1 flex flex-col">
  <div class="flex-1 flex flex-col md:flex-row gap-1 md:gap-4 p-4 justify-center items-center">
    @forelse($reclamations as $reclamation)
      <!-- Reclamation border -->
      <div class="@if(!$loop->last)border-b-2 mb-3 md:mb-0 md:border-b-0 md:border-r-2 border-black @endif relative p-4 flex-1 min-w-0 md:min-w-[420px] md:max-w-lg">
        @if($reclamation->status == Reclamation::STATUS_PENDING)
        <!-- Close button -->
        <a href="" class="fa-solid fa-xmark fa-lg absolute top-6 right-6" wire:click.prevent="cancel({{$reclamation}})"></a>
        <!-- End close button -->
       @endif
        <!-- Reclamation info-->
        <div class="flex flex-col gap-3 min-w-full px-2 md:px-4">
          <p class="font-bold text-lg">Broj reklamacije: {{$reclamation->id}}</p>
          <p class="font-bold text-lg">Broj porudžbine: U{{auth()->id()}}-O{{$reclamation->order_id}}</p>
          <p>Kreirana: {{$reclamation->created_at->format('H:i - d/m/Y');}}</p>
          <!-- Reclamation body-->
          <div class="flex flex-col w-full gap-4 overflow-y-auto h-52">
            <textarea name="text" readonly rows="8" cols="80" class="w-full h-full resize-none bg-gray-100 px-1" placeholder="Niste uneli tekst reklamacije!">{{$reclamation->text}}</textarea>
          </div>
          <!-- End reclamation items -->
          <div class="flex flex-col mt-2 border-t border-black">
            <!-- Footer info -->
            <div class="flex flex-row justify-center">
              <p>Status:
                @if($reclamation->status == Reclamation::STATUS_REFUNDED)
                  <span class="text-green-600">Refundirana</span>
                @elseif($reclamation->status == Reclamation::STATUS_PENDING)
                  <span class="text-yellow-600">Obrađuje se</span>
                @elseif($reclamation->status == Reclamation::STATUS_DENIED)
                  <span class="text-red-600">Odbijena</span>
                @endif
              </p>
            </div>
          </div>
          <!-- End reclamation footer -->
        </div>
        <!-- End reclamation info-->
      </div>
      <!-- End reclamation border-->
    @empty
      <img src="{{URL('/images/util/noreclamations.jpg')}}" alt="Nema reklamacija">
    @endforelse
  </div>
  <div class="flex justify-center text-center">
    {{$reclamations->links()}}
  </div>
</div>
