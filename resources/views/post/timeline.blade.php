@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-3 col-lg-6">
<h1>投稿一覧</h1>
</div>

  <!--search form-->
<div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-3 col-lg-6">
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
</div>
  <!--posts-->
  @foreach ($data as $post)
  <div id="timeline" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-4 col-lg-4"><!--card-->
      <div class="thumbnail" id="{{$post->went_at}}">
        <center><caption style="text-align:right;"><h2>{{$post->went_at}}</h2></caption></center> <!--いった日付-->
        
        <img src="{{$post->pic_url}}" class="img-responsive" alt="{{$post->pic_url}}">
        
        <div class="caption">
          <h2><center><span class="glyphicon glyphicon-cutlery"></span> {{$post->restaurant}}　  
              <span class="glyphicon glyphicon-yen"></span>{{$post->cost}}</center></h2>
            <center>  
            <h2><a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
            <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            </center>
            <center>
            @include('user_favo.favo_button')
            </center>
        </div>
      </div>
    </div>
  </div>
  @endforeach


@endsection