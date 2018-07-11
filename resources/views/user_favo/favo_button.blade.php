    @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['user.unfavo', $post->id], 'method' => 'delete']) !!}
            {!! Form::button('<span class="glyphicon glyphicon-heart"></span>', ['class' => "btn btn-danger btn-block", 'type'=>'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favo', $post->id]]) !!}
            {!! Form::submit('Favo', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
   