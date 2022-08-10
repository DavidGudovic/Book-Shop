@extends('templates.app')

@section('content')
  <div class="">
    <p>Api response: </p>
    @forelse($books as $book)
       <p>{{$book->name}} {{$book->isbn}} {{$book->price}} {{$book->category}}  {{$book->authors->first->name}}</p>
     @empty
           <p class="text-6xl font-bold text-black">Nema proizvoda</p>
    @endforelse

  </div>
@endsection
