@extends('layouts.app')
@section('content')

  <div class = "grade">
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-2 col-lg-8"4169e1>
    <center><h1>投稿一覧</h1></center>
    </div>
    <!--search form-->
  <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-3 col-lg-6" id = "search">
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
    <div class="col-xs-12 hidden-sm hidden-md hidden-lg"><!--card-->
      <div class="thumbnail" id="{{$post->went_at}}">
        <center><caption style="text-align:right;"><h2>{{$post->went_at}}</h2></caption></center> <!--いった日付-->
        <img src="{{$post->pic_url}}" class="img-responsive" alt="{{$post->pic_url}}">
        <div class="caption">
          <h2><center><span class="glyphicon glyphicon-cutlery"></span> {{$post->restaurant}}</center> 
          <center><span class="glyphicon glyphicon-yen"></span>{{$post->cost}}</center></h2>
            <center>  
            <h2><a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
            <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></h2>
            </center>
            <center>
            @include('user_favo.favo_button')
            </center>
        </div>
      </div>
    </div>
    <!--ここからPC表示-->
    <div class="hidden-xs col-sm-5 col-md- col-lg-offset-3 col-lg-6 thumbnail">
      <div  id="{{$post->went_at}}">
        <div class='col-lg-6'>
        <caption style="text-align:right;"><h2>{{$post->went_at}}</h2></caption>
        
        
        <img src="{{$post->pic_url}}" class="img-responsive" alt="{{$post->pic_url}}">
        </div>
          <br>
          <br>
          <div class="caption-pc col-lg-6">
          <h2><span class="glyphicon glyphicon-cutlery"></span> {{$post->restaurant}}</h2>
          <h2><span class="glyphicon glyphicon-yen"></span>{{$post->cost}}</h2>
              
            <h2><a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>詳細</a></h2>
            <h2><a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>編集</a></h2>
            
            @include('user_favo.favo_button')
           
          </div>
      </div>
    </div>
  </div>
  @endforeach
  

@endsection

