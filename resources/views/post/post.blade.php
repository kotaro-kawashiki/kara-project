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
        
        
         <button type="button" class="btn bg-white mt10 miw100 add_btn" value="" name="">入力欄追加</button>
    <br>
    <br>
        <div class="parent">
              <div class="field" style="padding-bottom:8px; border-bottom:1px solid #ccc;margin-bottom:20px;">
                {!! Form::label('people_name', '同行者:') !!}
                {!! Form::text('people_name[]',null, ['class' => 'form-control']) !!}
                <button type="button" class="btn trash_btn ml10" value="" name="">
                        削除
                </button>
              </div>
         </div>
        
        

        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
  </div>
</div>

@endsection