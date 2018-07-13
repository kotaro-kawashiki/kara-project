@extends('layouts.app')
@section('content')

    @foreach($names as $name)
    
    <a href="{{route('people.show',['id'=>$name])}}">
    {{$name}}
    </a>
    と{{$count["$name"]}}回<br>

    @endforeach


@endsection