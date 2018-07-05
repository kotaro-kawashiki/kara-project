@extends('layouts.app')

@section('content')

編集ページ

{!! Form::model($post, ['route' => ['posts.update',$post->id],'method'=>'put']) !!}
        <div class="form-group">
        {!! Form::label('restaurant', '店名:') !!}
        {!! Form::text('restaurant', null, ['class' => 'form-control']) !!}
         </div>
         <div class="form-group">        
        {!! Form::label('cost', '値段:') !!}
        {!! Form::text('cost', null, ['class' => 'form-control']) !!}
         </div>
        <div class="form-group">
        {!! Form::label('friends', '同行者:') !!}
        {!! Form::text('friends', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('went_at', '日にち:') !!}
        {!! Form::date('went_at', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('comments', 'コメント:') !!}
        {!! Form::text('comments', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}


@endsection