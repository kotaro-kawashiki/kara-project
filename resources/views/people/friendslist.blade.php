@extends('layouts.app')
@section('content')
<head>
<style>
        body {background-image: url("/image/shower.jpg"); }
        
</style>
</head>

    @if(!empty($people_info))
        <center><h1>同行者リスト</h1></center>
        <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-offset-1 col-lg-10">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>名前</th>
                    <th>回数</th>
                    <th>行ったことあるところ</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($people_info as $person)
                <tr>
                    <td>
                        <a href="{{ route( 'people.show',[ 'name'=>$person['name'] ] ) }}">
                            {{ $person['name'] }}
                        </a>
                    </td>
                    <td>
                        {{ $person['count'] }}回
                    </td>
                    <td>@foreach($person['restaurants'] as $restaurant)
                            {{ $restaurant }}
                        @endforeach
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        
    
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