@extends('layouts.app')
@section('content')
<head>
<style>
        body {background-image: url("/image/wood.jpg"); }
        
</style>
</head>
    <center><h1>{{ $person_infos[0]->people_name }}との記録</h1></center>
    <div class = "modoruyo">
      <h5><a href="{{ route('people.index') }}"><span class = "glyphicon glyphicon-arrow-left" aria-hidden="true"></span>同行者リストへ</a></h5>
    </div>
    <div id="timeline" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--全体-->
      @foreach ($person_infos as $info)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><!--card-->
          <div class="thumbnail" id="">
            <center><caption style="text-align:right;"><h2>{{$info->went_at}}</h2></caption></center> <!--いった日付-->
            <img src="{{$info->pic_url}}" class="img-responsive" alt="{{$info->pic_url}}">
            <div class="caption">
              <h2><center><span class="glyphicon glyphicon-cutlery"></span>{{$info->restaurant}}</center>　  
                  <center><span class="glyphicon glyphicon-yen"></span>{{$info->cost}}</center></h2>
                <center>  
                <h2><a href="{{ route('posts.show',['id' => $info->id]) }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
                <a href="{{ route('posts.edit',['id' => $info->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                </center>
                <center>
                @if (Auth::user()->is_favoriting($info->id))
                    {!! Form::open(['route' => ['user.unfavo', $info->id], 'method' => 'delete']) !!}
                        {!! Form::submit('お気に入りをやめる',['class' => 'btn btn-warning btn-lg']) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['user.favo', $info->id]]) !!}
                        {!! Form::submit('お気に入りにする',['class' => 'btn btn-default btn-lg']) !!}
                        
                    {!! Form::close() !!}
                @endif
                </center>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection