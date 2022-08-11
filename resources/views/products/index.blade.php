@extends('templates.app')

@section('content')
  <p class="font-extrabold text-3xl text-center mt-16 mb-4">Ponuda Knjiga</p>
  <div class="flex flex-col md:flex-row w-screen p-10 md:pr-6">
    <div class="mb-6 md:mb-0">
      <livewire:filters>
    </div>
    <div class="flex-1">
      <livewire:product-catalog :booksaa="$books">
    </div>
  </div>
@endsection
