@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
          <div class="col-sm-6 col-md-4 col-xs-offset-2 col-xs-8">
            <div class="thumbnail" id="{{$post->id}}">
              <img src="/image/penguin.jpg" alt="/image/penguin.jpg">
              <div class="caption">
                <h3>{{$post->restaurant}}</h3>
                <p>{{$post->cost}}円</p>
                <p>
                    {!! link_to_route('posts.show','detail',['id'=> $post->id]) !!}
                    {!! link_to_route('posts.edit', '編集',['id' => $post->id], ['class' => 'btn btn-warning']) !!}
                    {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                    @include('user_favo.favo_button', ['post' => $post])
                </p>
              </div>
            </div>
          </div>
          
          

@endforeach








@endsection