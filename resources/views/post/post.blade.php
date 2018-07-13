@extends('layouts.app') 

@section('content')

    <div class="col-xs-12 col-lg-6 ">
        <div class="alert alert-warning" role="alert">
    <strong>Notice</strong> 製品版では画像投稿が可能です。こうご期待！
  </div>
  
  {!! Form::model($post, ['route' => 'posts.store']) !!}
  
  <div class="form-group">
  {!! Form::label('restaurant', '店名*:') !!}
  {!! Form::text('restaurant', null, ['class' => 'form-control','placeholder'=>'必須項目']) !!}
  </div>
   
  <div class="form-group">        
  {!! Form::label('cost', '値段*:') !!}
  {!! Form::number('cost', null, ['class' => 'form-control','placeholder'=>'必須項目']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('went_at', '日にち*:') !!}
  {!! Form::date('went_at', null, ['class' => 'form-control','placeholder'=>'必須項目']) !!}
  </div>
  
  <div class="form-group">
  {!! Form::label('comments', 'コメント:') !!}
  {!! Form::text('comments', null, ['class' => 'form-control']) !!}
  </div>


  <div class="parent">
        <div class="field form-inline" style="padding-bottom:4px; margin-bottom:10px;">
            <div class="form-group">
              {!! Form::label('people_name', '同行者:',['class']) !!}
              {!! Form::text('people_name[]',null, ['class' => 'form-control']) !!}
              <button type="button" class="btn trash_btn ml10" value="" name="">
                      削除
              </button>
          </div>
        </div>
   </div>
   <button type="button" class="btn bg-white mt10 miw100 add_btn" value="" name="">同行者を追加</button><br><br>
  {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</div>

@endsection