<div
  x-data="{ showModal: @entangle($attributes->wire('model')) }"
  x-show="showModal" x-trap.noscroll="showModal"
  x-on:keydown.escape.window="showModal = false"
  x-cloak
  class="flex justify-center fixed inset-0 px-4 py-6 md:py-24 z-50">
  <div x-show="showModal" class="fixed inset-0 transform absolute inset-0 bg-gray-500 opacity-70 " x-on:click="showModal=false">
  </div>

   <div x-show="showModal" class="bg-white rounded-lg transform w-full md:w-1/2 p-6 z-50">
      {{ $slot }}
   </div>
</div>
