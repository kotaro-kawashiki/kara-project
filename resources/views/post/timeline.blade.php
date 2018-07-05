@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
        <tr>
            <td>お店：{{ $post->restaurant }}</td>
            <td>お値段：{{ $post->cost }}</td>
            <td>行った人{{ $post->friends }}</td>
            <td>行った日{{ $post->went_at }}</td>
            <td>コメント{{ $post->comments }}</td>
            {!! link_to_route('posts.edit', '編集',['id' => $post->id], ['class' => 'btn btn-warning']) !!}
            {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除') !!}
            {!! Form::close() !!}
            </tr>
            <br>
        
    @endforeach






@endsection