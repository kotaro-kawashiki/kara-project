@extends('layouts.app')
@section('content')
<head>
<style>
       body{
        background-image: url("/image/wood.jpg");
       }
       
       #phone{
                display: none !important; 
            }
       @media only screen and (max-width: 750px) {
                #pc { display: none !important; }
                #phone{ display: block !important; }
            }
</style>
</head>
  <div class = "grade">
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-2 col-lg-8">
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
<div id='phone'><center><a class="btn btn-lg btn-primary hidden-xs" href="{{route('posts.create')}}">記録をつける</a></center></div>
<div id='pc'><a href="{{route('posts.create')}}">{{Form::image('image/tag.png')}}</a></div>

  <!--posts-->
    @foreach ($data as $post)
    <div id="timeline" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
      <div class="col-xs-12 hidden-sm hidden-md hidden-lg"><!--card-->
        <div class="thumbnail" id="{{$post->went_at}}">
          <center><caption style="text-align:right;"><h3>{{$post->went_at}}</h3></caption></center> <!--いった日付-->
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
      <div class="col-md-offset-2 col-md-8 col-sm-12 col-lg-offset-3 col-lg-6">
      <div class="hidden-xs col-sm-5 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 thumbnail">
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
              <h2><a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
              <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></h2>
              @include('user_favo.favo_button')
              <br>
              <br>
            </div>
        </div>
        </div>
      </div>
    </div>
    @endforeach
    @if($message==0)
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">外食の履歴がありません！</h4>
              <hr>
              <p><a href="{{route('posts.create')}}">記録をつける</a>を押していつどこにいったかを記録してみましょう！</p>
          </div>
      </div>
    @endif
  
@endsection

