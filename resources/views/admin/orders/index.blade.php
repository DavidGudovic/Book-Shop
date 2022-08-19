@extends('templates.admin')


@section('dashboard')
  <div class="flex flex-col flex-1">
      <p class="text-center text-2xl font-bold py-16">Narudžbine</p>
      <div class="mt-6 w-full">
        <livewire:admin.orders.index />
      </div>
  </div>
@endsection
