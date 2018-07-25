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
       #pc{
         position:fixed;
         right:3%;
         bottom:1%;
         z-index: 1040;
       }
       @media only screen and (max-width: 768px) {
                #pc { display: none !important; }
                #phone{ display: block !important; }
            }
</style>
</head>
  <div class = "grade">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-offset-2 col-lg-8">
    <center><h1>投稿一覧</h1></center>
    </div>
    <!--search form-->
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-offset-3 col-lg-6" id = "search">
  <form method="GET" class="form-inline" name="form">
    <div class="form-group">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:10px;">
        <div class="input-group">
          <input type="text" class="form-control" name="s" placeholder="レストランや費用で検索" id="text1">
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
  <div id='pc'><a href="{{route('posts.create')}}">{{Form::image('image/tag.png')}}</a></div>
  @if($message==0)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-warning" role="alert">
            <center><h4 class="alert-heading">外食の記録がありません！</h4></center>
            <hr>
            <center><p><a href="{{route('posts.create')}}">記録をつける</a>を押して、日々の外食の記録をつけてみましょう！</p></center>
        </div>
    </div>
  @elseif($message==2)
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-warning" role="alert">
            <center><h4 class="alert-heading">検索結果はありません</h4></center>
            <hr>
            <center>
              <p>レストランの名前やその日のコメント、おおよその費用などいろいろな方法で検索できます。<br>
                 一緒に行った人の名前でも検索できるので、思い出を探してみましょう！
              </p>
            </center>
            
        </div>
    </div>
  @endif
  <!--posts-->
  <div id="timeline" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
    @foreach ($data as $post)
      <div class="col-xs-12 visible-xs" ><!--card-->
        <div class="thumbnail" id="{{$post->went_at}}" style="border-top: 5px solid {{$post->category}};">
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
      <div id="pccard" class="hidden-xs col-sm-8 col-sm-offset-1 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 thumbnail" style="border-left:5px solid {{$post->category}};">
        <div  id="{{$post->went_at}}">
          <div class='col-lg-6'>
          <caption style="text-align:right;"><h3>{{$post->went_at}}</h3></caption>
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
    @endforeach
  </div>

@endsection

