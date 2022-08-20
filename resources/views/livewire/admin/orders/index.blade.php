<div class="flex flex-col px-6 w-full">
  <!-- Filters -->
  <div class="flex flex-col md:flex-row w-full justify-around">
    <!-- Sort-->
    <div class="flex flex-col">
      <p>Sortiraj po</p>

      <div class="flex flex-row justify-between md:justify-start">
        <select class="" name="sortby" wire:model="sort_by" wire:change="resetPage">
          <option value="created_at">Datumu kreiranja</option>
          <option value="total_price">Ukupnoj ceni</option>
          <option value="user_id">Korisniku</option>
          <option value="id">Identifikacionom broju</option>
        </select>
        <select class="ml-1" name="sortDirection" wire:model="sort_direction" wire:change="resetPage">
          <option value="ASC">Rastuće</option>
          <option value="DESC">Opadajuće</option>
        </select>
      </div>

    </div>
    <!-- Category -->
    <div class="flex flex-col">
      <p>Status</p>
      <select class="" name="status" wire:model="status">
        <!-- Status filters -->
        <option value="0">Sve</option>
        <option value="{{Order::STATUS_PENDING}}">Obrađuje se</option>
        <option value="{{Order::STATUS_SUCCESSFULL}}">Ostvarena</option>
        <option value="{{Order::STATUS_CANCELLED}}">Otkazana</option>
        <option value="{{Order::STATUS_REFUNDED}}">Refundirana</option>
      </select>
    </div>

    <!-- Search -->
    <form wire:submit.prevent class="relative pt-3">
      <!-- Search Submit-->
      <button class="absolute right-2 pt-1 hover:text-yellow-400 z-10" type="submit">
        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
      </button>
      <!-- End search submit -->
      <!-- Search bar -->
      <input type="text" name="searchBar" placeholder="ID narudžbe ili korisnika"
      wire:model="search_query"
      class="b-white border border-gray-800 text-black rounded-3xl p-1 w-64">
      <!-- End search bar -->
    </form>
    <!--End Search -->
  </div>
  <!-- End filters -->

  <!-- Orders list wrapper -->
   <div class="flex flex-col items-center gap-4 w-full mt-6 md:mt-0 md:p-6">
     <!-- Order list-->
     <div class="flex flex-row flex-wrap gap-6 justify-center">
       @forelse($orders as $order)
         <!-- Order border-->
         <div class="border border-black p-4 pr-3 flex-1  min-w-[20rem] md:min-w-[28rem] md:max-w-[35rem]">
           <!-- Order info-->
           <div class="flex flex-col gap-3 min-w-full px-2 md:px-4">
             <div class="flex flex-col md:flex-row md:gap-3 font-bold text-lg">
                <p>ID porudžbine: {{$order->id}}</p></p>ID Korisnika: {{$order->user_id}}</p>
             </div>

             <p>Korisničko ime: {{$order->user->username}}</p>
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
               <p class="flex justify-center md:justify-end mt-2 gap-4">
                 @if($order->status == Order::STATUS_PENDING)
                   <a href="" wire:click.prevent="processOrder({{$order}}, {{Order::STATUS_SUCCESSFULL}})" class="text-black underline">Ostvari >></a>
                   <a href="" wire:click.prevent="processOrder({{$order}}, {{Order::STATUS_CANCELLED}})" class="text-black underline">Otkaži >></a>
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
     <!-- End order list -->
     <!-- Pagination -->
     <div class="text-center md:w-1/2">
       {{$orders->links()}}
     </div>
     <!-- End pagination -->
   </div>
  <!-- End orders list wrapper -->
</div>
