@extends('layouts.app')
@section('content')

    {{$name[0]}}<br>
    @foreach($restaurants as $restaurant)
        {{$restaurant}}
    @endforeach
    
@endsection