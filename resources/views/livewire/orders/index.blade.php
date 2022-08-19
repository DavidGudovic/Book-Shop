<div class="w-full flex flex-col items-center p-2 pt-4">
  <!-- Orders -->
  <div class="flex flex-1 flex-col md:flex-row justify-center w-full">
    @forelse($orders as $order)
      <!-- Order border-->
      <div class="@if(!$loop->last)border-b-2 mb-3 md:border-b-0 md:border-r-2 border-black @endif p-4 pr-3 flex-1 min-w-0 md:min-w-[420px]">
        <!-- Order info-->
        <div class="flex flex-col gap-3 min-w-full px-2 md:px-4">
          <p class="font-bold text-lg">Broj porudžbine: U{{auth()->id()}}-O{{$order->id}}</p>
          <p>Poručena: {{$order->created_at->format('H:i - d/m/Y');}}</p>
          <p>Stavke: </p>
          <!-- Order items-->
          <div class="flex flex-col w-full gap-4 overflow-y-auto h-[270px]">
            @foreach($order->books as $order_item)
              <!-- Item -->
              <div class="flex flex-col md:flex-row justify-between border-t border-black gap-2">
                <!-- Left info-->
                <div class="flex flex-col gap-3">
                  <p class="font-bold">{{$order_item->title}}</p>
                </div>
                <!-- Right info-->
                <div class="flex flex-row justify-between md:flex-col md:justify-center md:w-24">
                  <p>Količina: <span class="font-bold">{{$order_item->pivot->quantity}}</span></p>
                  <p>{{$order_item->pivot->quantity * $order_item->price}} RSD</p>
                </div>
                <!-- End info-->
              </div>
              <!-- End item -->
            @endforeach
          </div>
          <!-- End order items -->
          <!-- Order footer -->
          <div class="flex flex-col mt-2 border-t border-black">
            <!-- Footer info -->
            <div class="flex flex-row justify-between">
              <p class="font-bold">Ukupna vrednost: {{$order->total_price}}RSD</p>
              <p>Status:
              @if($order->status == Order::STATUS_SUCCESSFULL)
                <span class="text-green-600">Ostvarena</span>
              @elseif($order->status == Order::STATUS_PENDING)
                <span class="text-yellow-600">Obrađuje se</span>
              @elseif($order->status == Order::STATUS_CANCELLED)
                <span class="text-red-600">Otkazana</span>
              @elseif($order->status == Order::STATUS_REFUNDED)
                <span class="text-red-600">Refundirana</span>
              @endif
              </p>
            </div>
            <!-- End footer info-->
            <!-- Footer action -->
            <p class="flex justify-center md:justify-end mt-2">
              @if($order->status == Order::STATUS_SUCCESSFULL)
                <a href="" wire:click.prevent="addReclamation({{$order}})" class="text-black underline">Ostavi reklamaciju >></a>
              @elseif($order->status == Order::STATUS_PENDING)
                <a href="" wire:click.prevent="cancelOrder({{$order}})" class="text-black underline">Otkaži >></a>
              @endif
            </p>
            <!-- End footer action -->
          </div>
          <!-- End Order footer -->
        </div>
        <!-- End order info-->
      </div>
      <!-- End order border-->
    @empty
      <img src="{{URL('/images/util/noorders.jpg')}}" alt="Nemate narudžbi" class="text-center">
    @endforelse
  </div>
  <!-- End Orders-->
  <!-- Reclamation modal-->
  <livewire:reclamations.modal/>
  <!-- End modal-->
  <!-- Paginator -->
  <span class="text-center w-max">{{$orders->links()}}</span>
</div>
