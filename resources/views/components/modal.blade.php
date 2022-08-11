<div
  x-data="{ show: @entangle($attributes->wire('model')) }"
  x-show="show"
  x-on:keydown.escape.window="show = false"
  x-cloak
  class="flex justify-center fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 z-10">
  <div x-show="show" class="fixed inset-0 transform absolute inset-0 bg-gray-500 opacity-70" x-on:click="show=false">
  </div>

   <div x-show="show" class="bg-white rounded-lg overflow-y-auto transform  w-full md:w-1/2 p-6  ">
      {{ $slot }}
   </div>
</div>
