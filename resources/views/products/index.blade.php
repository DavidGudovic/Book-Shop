@extends('templates.app')

@section('content')

  <x-heading>
    Ponuda Knjiga
  </x-heading>

  <!--Wrapper of products-->
  <div class="flex flex-col md:flex-row w-screen p-10 pt-0 md:pr-6">
    <!-- Filters -->
    <div class="mb-6 md:mb-0">
      <livewire:filters :category_list="$filters">
    </div>
    <!-- End filter -->
    <!-- Products catalog -->
    <div class="flex-1">
      <livewire:product-catalog :book_list="$books">
    </div>
    <!-- End products -->
  </div>
  <!--End wrapper -->
@endsection
