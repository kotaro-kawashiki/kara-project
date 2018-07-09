@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
          <div class="col-sm-6 col-md-4 col-xs-offset-2 col-xs-8">
            <div class="thumbnail" id="{{$post->id}}">
              <caption style="text-align:right;">{{$post->went_at}}</caption>
              <img src="/image/penguin.jpg" alt="/image/penguin.jpg">
              <div class="caption">
                <h3>{{$post->restaurant}}</h3>
                <h4>㊎{{$post->cost}}円</h4>
                  <a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                  <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                  <a href="#"><span class="glyphicon glyphicon-heart"></span></a>
              </div>
            </div>
          </div>
    @endforeach






@endsection