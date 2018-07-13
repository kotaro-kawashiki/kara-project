@extends('layouts.app')

@section('content')
  <!--search form-->
<form method="GET" class="form-inline">
  <div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:10px;">
      <div class="input-group">
        <input type="text" class="form-control" name="s" placeholder="レストランや費用で検索">
        <span class="input-group-btn">
      		<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
      	</span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:10px;">
      <div class="input-group">
        <input type="text" class="form-control" name="h" placeholder="一緒に行った人で検索">
          <span class="input-group-btn">
        		<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        	</span>
        </div>
      </div>
    </div>
  </div>
</form>
  <!--posts-->
  @foreach ($data as $post)
  <div id="timeline" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="thumbnail" id="{{$post->went_at}}">
        <caption style="text-align:right;">{{$post->went_at}}</caption>
        <img src="/image/penguin.jpg" alt="/image/penguin.jpg">
        <div class="caption"> 
          <h3><span class="glyphicon glyphicon-cutlery"></span>:{{$post->restaurant}}</h3>
          <h4><span class="glyphicon glyphicon-credit-card"></span>:{{$post->cost}}円</h4>
            <a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a href="#"><span class="glyphicon glyphicon-heart"></span></a></h2>
            </center>
            @include('user_favo.favo_button')
        </div>
      </div>
    </div>
  </div>
  @endforeach


@endsection