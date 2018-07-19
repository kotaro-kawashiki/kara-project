    @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['user.unfavo', $post->id], 'method' => 'delete']) !!}

            {!! Form::submit('お気に入りをやめる',['class' => 'btn btn-warning btn-lg']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favo', $post->id]]) !!}
            {!! Form::submit('お気に入りにする',['class' => 'btn btn-default btn-lg']) !!}

        {!! Form::close() !!}
    @endif

