@extends('layouts.app')
@section('content')

    @foreach($people_info as $person)
    
    <div class="panel panel-default">
    	<div class="panel-heading">
            <a href="{{ route( 'people.show',[ 'name'=>$person['name'] ] ) }}">
                {{ $person['name'] }}
            </a>
            と{{ $person['count'] }} 回食事に行ったことがあります
    	</div>
    	<div class="panel-body">
    	    行ったことのあるお店：
    		@foreach($person['restaurants'] as $restaurant)
                {{ $restaurant }}
            @endforeach
    	</div>
    </div>
    
    @endforeach
    
@endsection