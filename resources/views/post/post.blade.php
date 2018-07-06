@extends('layouts.app') 

@section('content')

<div class="row">
        <div class="col-xs-6">
    {!! Form::model($post, ['route' => 'posts.store']) !!}
        <div class="form-group">
        {!! Form::label('restaurant', '店名:') !!}
        {!! Form::text('restaurant', null, ['class' => 'form-control']) !!}
         </div>
         <div class="form-group">        
        {!! Form::label('cost', '値段:') !!}
        {!! Form::text('cost', null, ['class' => 'form-control']) !!}
         </div>
        
        <div class="form-group">
        {!! Form::label('went_at', '日にち:') !!}
        {!! Form::date('went_at', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('comments', 'コメント:') !!}
        {!! Form::text('comments', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('people_name', '同行者:') !!}
        {!! Form::text('people_name', null, ['class' => 'form-control']) !!}
        </div>
        
        

        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection