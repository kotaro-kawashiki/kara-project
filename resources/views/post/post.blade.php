@extends('layouts.app') 

@section('content')


    <div class="col-xs-12 col-lg-offset-4 col-lg-4 ">
        <h1>新規投稿</h1>
      　<br>
        
        {!! Form::model($post, ['route' => 'posts.store']) !!}
        
        <div class="form-group">
        {!! Form::label('went_at', '日にち*:') !!}
        {!! Form::date('went_at', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('restaurant', '店名*:') !!}
        {!! Form::text('restaurant', null, ['class' => 'form-control','placeholder'=>'例：鳥貴族']) !!}
        </div>
         
        <div class="form-group">        
        {!! Form::label('cost', '値段*:') !!}
        {!! Form::number('cost', null, ['class' => 'form-control','placeholder'=>'例：2000']) !!}
        </div>
        
        <div class="form-group">
        {!! Form::label('comments', 'コメント:') !!}
        {!! Form::text('comments', null, ['class' => 'form-control','placeholder'=>'例:混んでたので大人数の際は要予約！']) !!}
        </div>

      
        <div class="parent">
              <div class="field form-inline" style="padding-bottom:4px; margin-bottom:10px;">
                  <div class="form-group">
                    {!! Form::label('people_name', '同行者:',['class']) !!}
                    {!! Form::text('people_name[]',null, ['class' => 'form-control','placeholder'=>'例:楽天太郎']) !!}
                    <button type="button" class="btn trash_btn ml10" value="" name="">
                            削除
                    </button>
                </div>
              </div>
         </div>
         <button type="button" class="btn bg-white mt10 miw100 add_btn" value="" name="">同行者を追加</button><br>
        
        <br>
        <div class="form-group">
        {!! Form::label('pic_url', '写真:') !!}
        {!! Form::select('pic_url',['/image/gohan.jpg' => '海鮮丼', '/image/wa.jpg' => '和食','/image/pancake.jpg' => 'パンケーキ'], ['class' => 'form-control']) !!}
        </div>
        <h5>※実際にはここで自分で撮った写真を投稿できる予定です;)</h5>

        
        <br>
        {!! Form::submit('投稿', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}
  </div>
  


@endsection