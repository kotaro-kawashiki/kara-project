@extends('layouts.app')

@section('content')
<head>
<style>
        body {background-image: url("/image/wood.jpg"); }
        #hontai-detail {
            margin-top: 0%;
            padding: 3% 3% 3% 3%;
        }
        #photo {
            background-color: white;
            padding-top: 2%;
            border-radius: 5%;
        }
        #list {
            background-color: white;
            padding-top: 2%;
            padding-bottom: 2%;
            border-radius: 5%;
        }
</style>
</head>
<div id="hontai-detail">
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-1 col-lg-4" id="photo">
         <img src="{{$post->pic_url}}" class="img-responsive" alt="{{$post->pic_url}}">
         <h5><a href="{{ route('calendar') }}">
         <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>カレンダーへ</a></h5>
         <h5><a href="{{ route('posts.store')}}">
         <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>投稿一覧へ</a></h5>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-6" id="list">
        <div class="panel panel-default">
            <div class="panel-heading">カテゴリ</div>
            <div class="panel-body">
                {{$category}}
            </div>
            <div class="panel-heading">店名</div>
            <div class="panel-body">
                <h4>{{$post->restaurant}}</h4>
            </div>
            <div class="panel-heading">金額</div>
            <div class="panel-body">
                {{$post->cost}}円
            </div>
            <div class="panel-heading">同行者</div>
               <div class="panel-body">
               @foreach($people as $person)
                    @if($person->post_id==$post->id)
                        <a href="{{ route( 'people.show',[ 'name'=>$person->people_name ] ) }}">
                            {{ $person->people_name }}
                        </a>
                    @endif
               @endforeach
            </div>
            <div class="panel-heading">日付</div>
            <div class="panel-body">
              {{$post->went_at}}
            </div>
            <div class="panel-heading">コメント</div>
            <div class="panel-body">
              {{$post->comments}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="btn-toolbar" role="toolbar">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    @if (Auth::user()->id == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('なかった事にする', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="btn-group" role="group"　class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        @include('user_favo.favo_button')
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="btn-group" role="group" class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
                      {!! link_to_route('posts.edit', 'この投稿を編集', ['id' => $post->id], ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
</div>
</div>


@endsection