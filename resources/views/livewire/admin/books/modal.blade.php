<div>
  <div
  x-data="{ showModal: @entangle('showModal') }"
  x-show="showModal" x-trap.noscroll="showModal"
  x-on:keydown.escape.window="showModal = false"
  x-cloak
  class="flex justify-center fixed inset-0 px-4 py-6 md:py-12 z-50">
  <!-- Modal Background -->
  <div x-show="showModal" class="fixed inset-0 transform bg-gray-500 opacity-70 " x-on:click="showModal=false"></div>
  <!-- End modal background-->

  <!-- Modal body -->
  <div class="flex flex-col bg-white rounded-lg transform p-6 pb-4 z-50 w-full h-3/4 md:w-1/2 md:h-full"

  <x-close-button/>
  <!/div>
  <!-- End Modal Body -->
</div>
</div>
