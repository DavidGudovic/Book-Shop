@extends('templates.app')

@section('content')
  <div class="">

    @forelse($books as $book)
       <p>TEST : {{$book->name}}  {{$book->isbn}}   ${{$book->category->name}}  ${{$book->authors->first->name}}</p>
     @empty
           <p class="text-6xl font-bold text-black">Nema proizvoda</p>
    @endforelse

  </div>
@endsection
