@extends('templates.admin')


@section('dashboard')
  <div class="flex flex-col flex-1">
      <p class="text-center text-2xl font-bold pt-16 py-8">Korisnici</p>
      <div class="w-full">
        <livewire:admin.users.index />
      </div>
      <livewire:admin.users.edit-modal />
  </div>
@endsection
