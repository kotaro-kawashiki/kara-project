@extends('layouts.app')

@section('content')

<!--検索ボタンのコーナー-->
<div id="kensaku" class="row">
      <div class="text-center">
          {!! Form::open(['method' => 'get', 'class' => 'form-inline']) !!}
          <div class="form-group">
          {!! Form::text('s',null, ['class' => 'form-control input-lg']) !!}
          </div>
          {!! Form::submit('検索', ['class' => 'btn btn-success btn-lg']) !!}
          {!! Form::close() !!}
      </div>
</div>

<!--タイムラインのカード-->
  @foreach ($data as $post)
  <div id="timeline" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-offset-4 col-lg-4"><!--card-->
      <div class="thumbnail" id="{{$post->went_at}}">
        <center><caption style="text-align:right;"><h2>{{$post->went_at}}</h2></caption></center> <!--いった日付-->
        
        <img class="img-rounded" src="/image/gohan.jpg" alt="/image/gohan.jpg">
        
        <div class="caption">
          <h2><center><span class="glyphicon glyphicon-cutlery"></span> {{$post->restaurant}}　  
              <span class="glyphicon glyphicon-yen"></span>{{$post->cost}}</center></h2>
            <center>  
            <h2><a href="{{ route('posts.show',['id' => $post->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
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