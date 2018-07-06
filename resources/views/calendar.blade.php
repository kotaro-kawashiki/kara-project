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
                    <h3>今月の使用額合計は...
                    <?php
                    $total = 0;
                    foreach($posts as $post){
                    $total += $post->cost;
                    }
                    echo $total
                    ?>円です!</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>



{!! link_to_route('posts.create', '投稿' ,null, ['class' => 'btn btn-warning']) !!}
@endsection
