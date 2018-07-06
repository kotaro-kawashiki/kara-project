@extends('layouts.app')

@section('content')

<img src="/image/penguin.jpg" alt="/image/penguin.jpg">
<div>{{$post->restaurant}}
     {{$post->cost}}円
     {{$post->went_at}}
     {{$post->friends}}
     {{$post->comments}}</div>

@endsection