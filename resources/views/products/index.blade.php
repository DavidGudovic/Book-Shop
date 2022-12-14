@extends('templates.app')

@section('content')

  <x-heading>
    Ponuda Knjiga
  </x-heading>

  <!--Wrapper of products-->
  <div class="flex flex-col md:flex-row w-full p-10 pt-0 md:pr-6">
    <!-- Filters -->
    <div class="mb-6 md:mb-0">
      <livewire:books.filters :category_list="$filters">
    </div>
    <!-- End filter -->
    <!-- Products catalog -->
    <div class="flex-1">
      <livewire:books.index :book_list="$books">
    </div>
    <!-- End products -->
  </div>
  <!--End wrapper -->
@endsection
