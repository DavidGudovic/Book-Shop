@extends('templates.app')

@section('content')
  <p>Api response: </p>
  <p>
    {{$book->name}} {{$book->isbn}} {{$book->category}}
    @foreach($book->authors as $author)
      {{$author->name}}
      @if(!$loop->last)
        <i class="fa-solid fa-minus"></i>
      @endif
    @endforeach
  </p>
@endsection
