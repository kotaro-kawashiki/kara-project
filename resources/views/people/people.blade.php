@extends('layouts.app')
@section('content')

    <!--<center> <h2>{{$name[0]}}と行ったお店一覧<br><h2>-->
    <center>
    <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7">
    <ul class="list-group list-group-flush">    
    <li class="list-group-item"><h2>{{$name[0]}}と行ったお店一覧</h2></li>
    @foreach($restaurants as $restaurant)
        <h3><li class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> {{$restaurant}}</h3></li>
    @endforeach
    </div>
    </center>
    
@endsection