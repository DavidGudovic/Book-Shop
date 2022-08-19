@extends('templates.admin')


@section('dashboard')
  <div class="flex flex-col flex-1">
      <p class="text-center text-2xl font-bold py-16">Korisnici</p>
      <div class="mt-6 w-full">
        <livewire:admin.users.index />
      </div>
      <livewire:admin.users.modal />
  </div>
@endsection
