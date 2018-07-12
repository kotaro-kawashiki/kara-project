@extends('layouts.app')

@section('content')
{!! Form::open(['method' => 'GET']) !!}
  {!! Form::text('s',null) !!}
  {!! Form::submit('検索') !!}
{!! Form::close() !!}
  @foreach ($data as $post)
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="thumbnail" id="{{$post->went_at}}">
        <caption style="text-align:right;">{{$post->went_at}}</caption>
        <img src="/image/penguin.jpg" alt="/image/penguin.jpg">
        <div class="caption">
          <h3><span class="glyphicon glyphicon-cutlery"></span>:{{$post->restaurant}}</h3>
          <h4><span class="glyphicon glyphicon-credit-card"></span>:{{$post->cost}}円</h4>
            <a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a href="#"><span class="glyphicon glyphicon-heart"></span></a>
            @include('user_favo.favo_button')
        </div>
      </div>
    </div>
  </div>
  @endforeach


@endsection