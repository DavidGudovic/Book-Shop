@extends('templates.admin')

@section('dashboard')
  <div class="flex flex-col flex-1 items-center">
      <p class="text-center text-2xl font-bold pt-16 pb-14">Proizvodi</p>
      <a href="#" x-data='{}' x-on:click.prevent="window.livewire.emitTo('admin.books.modal', 'showModal')" class="text-center p-2 bg-black text-white w-44 rounded-2xl">Dodaj proizvod</a>
      <div class="my-6 w-full">
        <livewire:admin.books.index />
      </div>
      <livewire:admin.books.modal />
  </div>
@endsection
