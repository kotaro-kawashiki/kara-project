@extends('layouts.app')

@section('content')

  <div id="favotitle" class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-4 col-lg-4">
    <center><h1>お気に入り投稿一覧</h1></center>
  </div>
  @foreach ($posts as $post)
    <div id="favolist" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
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