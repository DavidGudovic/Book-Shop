@extends('templates.app')

@section('content')

  <h1 class="font-extrabold text-3xl text-center mt-16 mb-4">Ponuda Knjiga</h1>
  <!--Wrapper of products-->
  <div class="flex flex-col md:flex-row w-screen p-10 md:pr-6">
    <!-- Responsive filters -->
    <div class="mb-6 md:mb-0">
      <livewire:filters :category_list="$filters">
    </div>
    <!-- End filter -->
    <!-- Products display -->
    <div class="flex-1">
      <livewire:product-catalog :book_list="$books">
    </div>
    <!-- End products -->
  </div>
  <!--End wrapper -->
@endsection
