@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
     <img src="{{$post->pic_url}}" class="img-responsive" alt="{{$post->pic_url}}">
     <caption>
         
     </caption> 
</div>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
     
     <div class="panel panel-default">
            <div class="panel-heading">店名</div>
            <div class="panel-body">
              <h4>{{$post->restaurant}}</h4>
            </div>
            <div class="panel-heading">金額</div>
            <div class="panel-body">
              {{$post->cost}}円
            </div>
            <div class="panel-heading">同行者</div>
               <div class="panel-body">
               @foreach($peoples as $people)
                    @if($people->post_id==$post->id)
                         {{$people->people_name}},
                    @endif
               @endforeach
            </div>
            <div class="panel-heading">日付</div>
            <div class="panel-body">
              {{$post->went_at}}
            </div>
            <div class="panel-heading">メモ</div>
            <div class="panel-body">
              {{$post->comments}}
            </div>
        </div>
          
        <div class="btn-toolbar" role="toolbar">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                @if (Auth::user()->id == $post->user_id)
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('なかった事にする', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="btn-group" role="group"　class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    @include('user_favo.favo_button')
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="btn-group" role="group" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  {!! link_to_route('posts.edit', 'この投稿を編集', ['id' => $post->id], ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
</div>
     
     
     <!--<table border="1">-->
     <!--     <tbody>-->
     <!--            <tr><td><h4>店名</h4></td><td><h3>{{$post->restaurant}}</h3></td></tr>-->
     <!--            <tr><td><h4>金額</h4></td><td><h3>{{$post->cost}}円</h3></td></tr>-->
     <!--            <tr><td><h4>同行者</h4></td>-->
     <!--            <td><h3>-->
     <!--               @foreach($peoples as $people)-->
     <!--                    @if($people->post_id==$post->id)-->
     <!--                         {{$people->people_name}},-->
     <!--                    @endif-->
     <!--               @endforeach-->
     <!--               </h3></td></tr>-->
     <!--            <tr><td><h4>日付</h4></td><td><h3>{{$post->went_at}}</h3></td></tr>-->
     <!--            <tr><td><h4>メモ</h4></td><td><h3>{{$post->comments}}</h3></td></tr>-->
     <!--     </tbody>-->
     <!--</table>-->


@endsection