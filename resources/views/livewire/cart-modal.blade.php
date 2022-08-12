<div>
  <x-modal wire:model="showModal">
    <!-- Cart -->
    <div class="flex flex-col bg-white rounded-lg transform p-6 pb-4 z-50 w-full h-3/4 md:w-1/2 md:h-full"
         x-show="showModal"
         x-data="{emptyCart: false}">
      <!-- Close Button -->
      <a href="" class="fa-solid fa-xmark fa-xl absolute top-6 right-6"
      x-on:click.prevent="showModal = false"></a>
      <!-- End Close button -->
      <!-- Cart Heading -->
      <div class="flex flex-row justify-center items-center">
        <p class="text-2xl font-bold text-center p-3 ">Korpa</p>
          <!-- Loading indicator -->
          <img wire:loading src="{{URL('/images/util/loading.gif')}}" class="h-12 pt-2">
          <!-- end loading indicator -->
      </div>
      <!-- End Heading -->

      <!-- Cart Items -->
      <div class="flex flex-col flex-1 gap-10 items-center w-full overflow-y-auto border-b-2 border-black">
        @forelse($tester as $test => $testVal)
          <!-- Item -->
          <div class="relative flex flex-row justify-between border-b-2 border-gray-500 w-full md:p-6">
            <!-- Left Info --->
            <div class="flex flex-col gap-2">
                <p class="font-bold md:text-2xl">{{$testVal}}</p>
                <p>Author</p>
            </div>
            <!-- End left -->
            <!-- Right info -->
            <div class="flex flex-col justify-evenly mr-12">
              <p class="text-sm text-gray-600">Količina 2</p>
              <p class="text-sm text-gray-600">1200RSD</p>
            </div>
            <!-- End right -->
            <!-- Actions -->
            <a href="" wire:click.prevent="remove({{$test}})" class="text-gray-600 fa-solid fa-xmark absolute right-2 top-6 md:top-12"></a>
            <a href="" x-click.prevent="" class="text-gray-600 fa-solid fa-angle-up absolute right-7 top-4 md:top-9 md:right-9"></a>
            <a href="" x-click.prevent="" class="text-gray-600 fa-solid fa-angle-down absolute right-7 top-8 md:top-16 md:right-9"></a>
            <!-- End actions -->
          </div>
          <!-- Item -->
        @empty
          <img x-init="emptyCart = true" src="{{URL('/images/util/noresult.jpg')}}" class="w-[250px] md:w-[350px]">
        @endforelse
      </div>
      <!-- End Cart Items -->

      <!-- Cart Footer -->
      <!-- Not empty -->
      <div x-show="!emptyCart" class="flex flex-col justify-center gap-2 items-center ">
        <p class="font-bold text-center">Ukupno:</p>
        <p class="text-center text-sm">12000RSD</p>
        <a href="" class="p-1 text-center rounded-xl bg-black text-white w-32">Naruči</a>
      </div>
      <!-- Empty -->
      <div x-show="emptyCart" class="flex flex-col justify-center gap-2 items-center ">
        <a href="" class="p-1 mt-6 mb-2 text-center rounded-xl bg-black text-white w-32 ">Pogledaj ponudu</a>
      </div>
      <!-- End Cart Footer -->
    </div>
    <!-- End Cart -->
  </x-modal>
</div>
