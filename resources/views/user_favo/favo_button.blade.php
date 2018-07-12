    @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['user.unfavo', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavo') !!}
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favo', $post->id]]) !!}
            {!! Form::submit('Favo') !!}
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
        {!! Form::close() !!}
    @endif
