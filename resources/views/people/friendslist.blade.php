@extends('layouts.app')
@section('content')

    @foreach($people_info as $person)
    
    <a href="{{ route( 'people.show',[ 'name'=>$person['name'] ] ) }}">
    {{ $person['name'] }}
    </a>
    と{{ $person['count'] }} 回、
        @foreach($person['restaurants'] as $restaurant)
        {{ $restaurant }}
        @endforeach
    に行ったことがあります
    <br>
    @endforeach
    
@endsection