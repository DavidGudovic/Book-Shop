<div class="flex flex-col items-center md:px-44">
  <div class="flex flex-row justify-center gap-3">
    <p class="font-bold">Generiši za mesec: </p>
    <select  wire:model="month" name="month filter" class="w-fit">
      <!-- Month filters .. hardcoded .. -->
      <option value="1">Januar</option>
      <option value="2">Februar</option>
      <option value="3">Mart</option>
      <option value="4">April</option>
      <option value="5">Maj</option>
      <option value="6">Jun</option>
      <option value="7">Jul</option>
      <option value="8">Avgust</option>
      <option value="9">Septembar</option>
      <option value="10">Oktobar</option>
      <option value="11">Novembar</option>
      <option value="12">Decembar</option>
    </select>
  </div>

  <div class="relative flex flex-col justify-center items-center w-full border border-black h-fit my-4 p-4 min-w-96">
    
    @if($totalOrders != 0)
      <!-- PDF button -->
      <a href="" class="fa-solid fa-file-pdf fa-2xl absolute top-6 right-4" wire:click.prevent="print"></a>
      <!-- Upper row -->
      <div class="flex flex-col md:flex-row w-full gap-2">
        <!-- General stats -->
        <div class="flex flex-row w-full md:w-[47.5rem] border-b md:border-b-0 md:border-r border-black">
          <div class="flex flex-col w-44">
            <strong>Ukupno narudzbina: </strong>
            <strong>Knjiga prodato: </strong>
            <strong>Zaradjeno: </strong>
            <strong>Novih korisnika: </strong>
          </div>

          <div class="flex flex-col w-44">
            <p>{{$totalOrders}}</p>
            <p>{{$totalProducts}}</p>
            <p>{{$totalIncome}} RSD</p>
            <p>{{$newUsers}}</p>
          </div>
        </div>
        <!-- End general stats-->
        <!-- Orders by status -->
        <div class="flex flex-row w-full">
          <div class="flex flex-col w-full">
            <p class="font-bold">Status</p>
            <p>Neobrađene</p>
            <p>Ostvarene</p>
            <p>Otkazane</p>
            <p>Refundirane</p>
          </div>
          <div class="flex flex-col w-full">
            <p class="font-bold">Broj</p>
            <p>{{$orderReport[Order::STATUS_PENDING-1]->count ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_SUCCESSFULL-1]->count ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_CANCELLED-1]->count ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_REFUNDED-1]->count ?? 0}}</p>
          </div>
          <div class="flex flex-col w-full">
            <p class="font-bold">Total RSD: </p>
            <p>{{$orderReport[Order::STATUS_PENDING-1]->total ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_SUCCESSFULL-1]->total ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_CANCELLED-1]->total ?? 0}}</p>
            <p>{{$orderReport[Order::STATUS_REFUNDED-1]->total ?? 0}}</p>
          </div>
        </div>
        <!-- End orders by status -->
      </div>
      <!-- End upper row -->

      <!-- Bottom row-->
      <div class="flex flex-col md:flex-row w-full gap-4 md:border-t border-black">
        <!-- User report -->
        <div class="flex flex-col w-full border-t border-black md:border-t-0">
          <p class="font-bold mb-2">Potrošnja 10 najaktivnjih korisnika</p>
          <!-- Header -->
          <div class="flex flex-row w-fit font-bold">
            <p class="w-20 md:w-16">ID</p>
            <p class="w-24 md:w-16">Količina</p>
            <p class="w-24 ml-5">Potrošili RSD</p>
          </div>
          <!-- End header -->
          <!-- Data -->
          @foreach($userReport as $data)
            <div class="flex flex-row w-fit">
                <p class="w-20 md:w-16">{{$data->user_id}}</p>
                <p class="w-24 md:w-16">{{$data->count}}</p>
                <p class="w-24 ml-5">{{$data->total}}</p>
            </div>
          @endforeach
          <!-- End data-->
        </div>
        <!-- End user report-->
        <!-- Product report -->
        <div class="flex flex-col w-full border-t border-black md:border-t-0  md:border-l md:pl-2">
            <p class="font-bold mb-2">Promet proizvoda:</p>
            <!-- Header -->
            <div class="flex flex-row w-fit font-bold">
              <p class="w-52 hidden md:inline-flex">Naziv</p>
              <p class="inline-flex md:hidden w-20">ID</p>
              <p class="w-24 md:w-20">Količina</p>
              <p class="w-24 ml-5">Total RSD</p>
            </div>
            <!-- End header -->
            <!-- Data -->
          @foreach($productQuantities as $productId => $quantity)
            <div class="flex flex-row w-fit">
                <p class="w-52 hidden md:inline-flex">{{$products[$productId]->title}}</p>
                <p class="inline-flex md:hidden w-20">{{$productId}}</p>
                <p class="w-24 md:w-20">{{$quantity}}</p>
                <p class="w-24 ml-5">{{$productTotals[$productId]}}</p>
            </div>
          @endforeach
        </div>
        <!-- End product report-->
      </div>
      <!-- End bottom row-->
    @else
      <p class="text-center font-bold text-2xl p-6">Nema podataka</p>
    @endif
  </div>

</div>
