@extends('templates.user-profile')

@section('window')
  <div class="flex h-full w-full flex-row border border-black">
    <livewire:reclamation-history />
  </div>
@endsection

@section('filters')
  <!-- Reclamation Filters -->
  <div class="flex flex-col border border-black px-8 md:w-72">
    <form x-data='{statusFilter: 0}' class="flex flex-col gap-1 py-4 "action="index.html" method="post">
      <p class="font-bold text-center">Filteri</p>
      <p>Status</p>
      <!-- Status filters -->
      <select x-model="statusFilter" class="" name="">
        <option value="0">Sve</option>
        <option value="{{Reclamation::STATUS_PENDING}}">Obrađuje se</option>
        <option value="{{Reclamation::STATUS_REFUNDED}}">Refundirana</option>
        <option value="{{Reclamation::STATUS_DENIED}}">Odbijena</option>
      </select>
      <!--End status filters -->
      <!-- Actions -->
      <div class="flex flex-row gap-6 mt-4">
        <button x-on:click.prevent="window.livewire.emit('setReclamationFilters', statusFilter)" type="submit" class="form-btn py-1">Primeni</button>
        <button x-on:click.prevent="statusFilter = 0; window.livewire.emit('setReclamationFilters', statusFilter)" type="reset" class="form-btn bg-gray-500 py-1">Resetuj</button>
      </div>
      <!-- End actions -->
    </form>
  </div>
  <!-- End reclamation filters-->
@endsection
