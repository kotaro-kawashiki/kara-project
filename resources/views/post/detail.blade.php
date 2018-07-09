@extends('layouts.app')

@section('content')

<img src="/image/penguin.jpg" alt="/image/penguin.jpg">
<div>{{$post->restaurant}}
     {{$post->cost}}円
     {{$post->went_at}}
     @foreach($people as $people)
          @if($people->post_id==$post->id)
               {{$people->people_name}}
          @endif
     @endforeach
     {{$post->comments}}
     
     </div>

@endsection