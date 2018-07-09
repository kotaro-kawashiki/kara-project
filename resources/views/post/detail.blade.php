@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
     <img src="/image/penguin.jpg" class="img-responsive" alt="/image/penguin.jpg">
</div>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
     <div class="media-heading">
     {{$post->restaurant}}
     {{$post->cost}}円
     {{$post->went_at}}
     {{$post->friends}}
     {{$post->comments}}
     </div>
</div>     







     

@endsection