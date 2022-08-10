@extends('templates.app')

@section('content')
  <p>Api response: </p>
  <p>{{$book->name}} {{$book->isbn}} {{$book->category}} {{$book->authors->first()->name}}</p>
@endsection
