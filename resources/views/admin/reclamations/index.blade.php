@extends('templates.admin')


@section('dashboard')
  <div class="flex flex-col flex-1">
      <p class="text-center text-2xl font-bold py-16">Reklamacije</p>
      <div class="w-full">
        <livewire:admin.reclamations.index />
      </div>
  </div>
@endsection
