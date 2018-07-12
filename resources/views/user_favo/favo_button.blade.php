    @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['user.unfavo', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavo') !!}
            
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favo', $post->id]]) !!}
            {!! Form::submit('Favo') !!}
            
        {!! Form::close() !!}
    @endif
