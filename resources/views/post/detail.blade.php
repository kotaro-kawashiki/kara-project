@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
     <img src="/image/gohan.jpg" class="img-responsive" alt="/image/gohan.jpg">
     <caption>
          <a href="{{ route('posts.edit',['id' => $post->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          <a href="#"><span class="glyphicon glyphicon-heart"></span></a>
     </caption>
</div>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
     <ul class="list-group list-group-flush">
       <li class="list-group-item"><h2>{{$post->restaurant}}</h2></li>
       <li class="list-group-item"><h3>{{$post->cost}}円</h3></li>
       <li class="list-group-item"><ul style="padding-left:0px;">
          @foreach($peoples as $people)
               @if($people->post_id==$post->id)
                    <li style="display:inline-block;">{{$people->people_name}},</li>
               @endif
          @endforeach
          </ul></li>
       <li class="list-group-item">{{$post->went_at}}</li>
       <li class="list-group-item">{{$post->comments}}</li>
     </ul>
     @if (Auth::user()->id == $post->user_id)
        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('なかった事にする', ['class' => 'btn btn-danger btn-xs pull-right']) !!}
        {!! Form::close() !!}
     @endif
</div>

@endsection