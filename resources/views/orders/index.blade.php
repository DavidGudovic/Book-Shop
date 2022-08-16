@extends('templates.user-profile')

@section('window')
  <div class="flex h-full w-full flex-row border border-black">
    <livewire:order-history/>
  </div>
@endsection

@section('filters')
  <div class="flex flex-col border border-black px-8 md:w-72">
    <form  x-data='{ monthFilter: 0, statusFilter: 0}' class="flex flex-col gap-1 py-4 "action="index.html" method="post">
      <p class="font-bold text-center">Filteri</p>
      <p>Mesec</p>
      <select  x-model="monthFilter" class="" name="">
        <!-- Month filters .. hardcoded .. -->
        <option value="0">Sve</option>
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
      <p>Status</p>
      <select  x-model:="statusFilter" class="" name="">
        <!-- Status filters -->
        <option value="0">Sve</option>
        <option value="{{Order::STATUS_SUCCESSFULL}}">Ostvarena</option>
        <option value="{{Order::STATUS_PENDING}}">Obrađuje se</option>
        <option value="{{Order::STATUS_CANCELLED}}">Otkazana</option>
        <option value="{{Order::STATUS_REFUNDED}}">Refundirana</option>
      </select>
      <div class="flex flex-row gap-6 mt-4">
        <button x-on:click.prevent="window.livewire.emit('setFilters', statusFilter, monthFilter)" type="submit" class="form-btn py-1">Primeni</button>
        <button x-on:click="monthFilter = 0; statusFilter = 0; window.livewire.emit('setFilters', monthFilter, statusFilter)"type="reset" class="form-btn bg-gray-500 py-1">Resetuj</button>
      </div>
    </form>
  </div>
@endsection
