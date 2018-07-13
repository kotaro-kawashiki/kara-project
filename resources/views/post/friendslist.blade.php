@extends('layouts.app')
@section('content')

    @foreach($names as $name)
    
    {{$name}}と{{$count["$name"]}}回<br>

    @endforeach


@endsection