@extends('layouts.app')
@section('content')

    <center> <h2>{{$name[0]}}<h2>と行ったお店リスト<br>
    @foreach($restaurants as $restaurant)
       <h3> {{$restaurant}}<h3>
    @endforeach
    </center>
    
@endsection