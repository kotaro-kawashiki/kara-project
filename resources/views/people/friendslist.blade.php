@extends('layouts.app')
@section('content')

   <center> @foreach($names as $name)
    
   <h3>
    ・<a href="{{route('people.show',['id'=>$name])}}">
   {{$name}}
    </a>
    と{{$count["$name"]}}回<br>
    </h3>

    @endforeach
    </center>


@endsection