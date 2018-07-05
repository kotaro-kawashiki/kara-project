        <!--Once you log in, you will be this page-->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($posts as $post)
                <tr>
                         <td>{{ $post->restaurant }}</td>
                         <td>{{ $post->cost }}</td>
                         <td>{{ $post->friends }}</td>
                         <td>{{ $post->went_at }}</td>
                         <td>{{ $post->comments }}</td></tr>
        
            @endforeach

{!! link_to_route('posts.create', '投稿' ,null, ['class' => 'btn btn-warning']) !!}
@endsection
