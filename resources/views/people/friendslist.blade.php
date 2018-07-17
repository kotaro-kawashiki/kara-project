@extends('layouts.app')
@section('content')

   <center> @foreach($names as $name)
    
    <a href="{{route('people.show',['name'=>$name])}}">
    {{$name}}
    </a>
    と{{$count["$name"]}}回<br>
    </h3>

    @endforeach
    </center>


@endsection