<div class="w-full flex flex-col items-center p-2 pt-4">
  <!-- Orders -->
  <div class="flex flex-1 flex-col md:flex-row">
    @foreach($orders as $order)
      <div class="@if(!$loop->last)border-b md:border-b-0 md:border-r border-black @endif p-2">
        <p>ID: {{$order->id}}  TOTAL: {{$order->total_price}}</p>
      </div>
    @endforeach
  </div>
  <!-- End Orders-->

  <!-- Paginator -->
  <span class="text-center w-max">{{$orders->links()}}</span>
</div>
