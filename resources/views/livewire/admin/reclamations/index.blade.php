<div class="flex flex-col w-full">

  <!-- Filters -->
  <div class="flex flex-col md:flex-row w-full justify-around">
    <!-- Sort-->
    <div class="flex flex-col">
      <p>Sortiraj po</p>
      <div class="flex flex-row justify-between md:justify-start">
        <select class="" name="orderBy" wire:model="sort_by" wire:change="resetPage">
          <option value="created_at">Datumu dodavanja</option>
          <option value="order_id">Narudžbi</option>
          <option value="user_id">Korisniku</option>
          <option value="id">Identifikacionom broju</option>
        </select>
        <select class="ml-1" name="orderDirection" wire:model="sort_direction" wire:change="resetPage">
          <option value="ASC">Rastuće</option>
          <option value="DESC">Opadajuće</option>
        </select>
      </div>
    </div>
    <!-- Category -->
    <div class="flex flex-col">
      <p>Status</p>
        <!-- Status filters -->
      <select class="" name="status" wire:model="status">
        <option value="0">Sve</option>
        <option value="{{Reclamation::STATUS_PENDING}}">Obrađuje se</option>
        <option value="{{Reclamation::STATUS_DENIED}}">Odbijena</option>
        <option value="{{Reclamation::STATUS_REFUNDED}}">Refundirana</option>
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
      <input type="text" name="searchBar" placeholder="ID Kor, Narudžbe ili Reklamacije"
      wire:model="search_query"
      class="b-white border border-gray-800 text-black rounded-3xl p-1 w-64">
      <!-- End search bar -->
    </form>
    <!--End Search -->
  </div>
  <!-- End filters -->


  <!-- Reclamations list wrapper -->
   <div class="flex flex-col items-center gap-4 w-full mt-6 md:mt-0 md:p-6">

     <!-- Reclamation list-->
     <div class="flex flex-col md:flex-row md:flex-wrap gap-6 justify-center">
       @forelse ($reclamations as $reclamation)
         <div class="border border-black relative p-4 flex-1 min-w-0 md:min-w-[420px] md:max-w-lg">
           @if($reclamation->status == Reclamation::STATUS_PENDING)
           <!-- Actions -->
             <a href="" class="fa-solid fa-check fa-lg absolute top-6 right-14 text-green-500" wire:click.prevent="processReclamation({{$reclamation}}, {{Reclamation::STATUS_REFUNDED}})"></a>
             <a href="" class="fa-solid fa-xmark fa-lg absolute top-6 right-6 text-red-500" wire:click.prevent="processReclamation({{$reclamation}}, {{Reclamation::STATUS_DENIED}})"></a>
           <!-- End Actions -->
          @endif
           <!-- Reclamation info-->
           <div class="flex flex-col gap-3 min-w-full px-2 md:px-4">
             <div class="flex flex-col md:flex-row gap-2">
               <p class="font-bold text-lg">ID reklamacije: {{$reclamation->id}}</p>
               <span class="hidden md:inline-block font-bold"> - </span>
               <p class="font-bold text-lg">ID porudžbine: {{$reclamation->order_id}}</p>
             </div>
             <p class="font-bold text-lg">Korisnik: {{$reclamation->user_id}} - {{$reclamation->user->username}}</p>
             <p>Kreirana: {{$reclamation->created_at->format('H:i - d/m/Y');}}</p>
             <!-- Reclamation body-->
             <div class="flex flex-col w-full gap-4 overflow-y-auto h-52">
               <textarea name="text" readonly rows="8" cols="80" class="w-full h-full resize-none bg-gray-100 px-1" placeholder="Reklamacija nema tekst!">{{$reclamation->text}}</textarea>
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
          <img src="{{URL('/images/util/noresult-admin.jpg')}}" alt="Nemate narudžbi" class="text-center">
       @endforelse
     </div>
     <!-- End reclamations list -->

     <!-- Pagination -->
     <div class="text-center md:w-1/2">
       {{$reclamations->links()}}
     </div>
     <!-- End pagination -->
   </div>
  <!-- End reclamations list wrapper -->





</div>
