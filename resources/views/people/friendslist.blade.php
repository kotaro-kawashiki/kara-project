@extends('layouts.app')
@section('content')

    @if(!empty($people_info))
    <ul class="list-unstyled">
        @foreach($people_info as $person)
            <li>
            <div class="col-lg-4">
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
            </div>
            </li>
        @endforeach
    </ul>
    @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">同行者の履歴がありません！</h4>
                <hr>
                <p><a href="{{route('posts.create')}}">記録をつける</a>と誰とどこに、何回食事をしたことがあるかを見ることができます</p>
            </div>
        </div>
    @endif
@endsection