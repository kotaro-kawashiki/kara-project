@extends('layouts.app')

@section('content')
<head>
<style>
        body {
            background-image: url("/image/flower2.jpg"); 
        }
        #hontai {
            background-color: white;
            filter:alpha(opacity=90);
            -moz-opacity: 0.9;
            opacity: 0.9;
            padding-bottom: 3%;
            border-radius: 5%;
        }
</style>
</head>
<div class="col-xs-12 col-lg-offset-4 col-lg-4" id="hontai">
    <h1>投稿の編集</h1><br>
    <!--足しました-->
    <h5><a href="{{ route('posts.show', ['id' => $post->id]) }}"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>詳細へ</a></h5>
    <h5><a href="{{ route('posts.store') }}"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>投稿一覧へ</a></h5><br>
    {!! Form::model($post, ['route' => ['posts.update',$post->id],'method'=>'put']) !!}
        <div class="form-group">
            <label name="category">カテゴリ:</label>
            <select name="category" class="form-control">
              <option value="#aae"<?php if($post->category=="#aae"){echo "selected"; }?>>会社</option>
              <option value="#bea"<?php if($post->category=="#bea"){echo "selected"; }?>>友達</option>
              <option value="#aee"<?php if($post->category=="#aee"){echo "selected"; }?>>家族</option>
              <option value="#eaa"<?php if($post->category=="#eaa"){echo "selected"; }?>>そのほか</option>
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('restaurant', '店名*:') !!}
            {!! Form::text('restaurant', null, ['class' => 'form-control','placeholder'=>'例：鳥貴族']) !!}
        </div>
        <div class="form-group">        
            {!! Form::label('cost', '値段*:') !!}
            {!! Form::number('cost', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label name="went_at">日付*:</label>
            <div class='input-group date'>
                <input type='text' name="went_at" value='{{$post->went_at}}' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comments', 'コメント:') !!}
            {!! Form::text('comments', null, ['class' => 'form-control']) !!}
        </div>
        <div class="parent">
            @if(count($people)>0)
                @foreach($people as $user_people)
                    <div class="field form-inline" style="padding-bottom:4px; margin-bottom:10px;">
                        <div class="form-group">
                            {!! Form::label('people_name', '同行者:',['class']) !!}
                            <input type="text" id="people" name="people_name[]" value="{{$user_people}}" placeholder='例:楽天太郎' class='form-control doukousya' ></input>
                            <button type="button" class="btn btn-default trash_btn ml10" value="" name="">
                                削除
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="field form-inline" style="padding-bottom:4px; margin-bottom:10px;">
                    <div class="form-group">
                      {!! Form::label('people_name', '同行者:',['class']) !!}
                      <input type="text" id="people" name="people_name[]" value="" placeholder='例:楽天太郎' class='form-control doukousya' ></input>
                      <button type="button" class="btn btn-default trash_btn ml10" value="" name="">
                              削除
                      </button>
                  </div>
                </div>
            @endif
         </div>
        <button type="button" class="btn btn-default bg-white mt10 miw100 add_btn" value="" name="">同行者を追加</button><br><br>
        <div class="form-group">
            <label name="pic_url">写真:</label>
            <select name="pic_url" class="form-control">
              <option value="/image/susi1.jpg"<?php if($post->pic_url=="/image/susi1.jpg"){echo "selected"; }?>>寿司</option>
              <option value="/image/gohan.jpg"<?php if($post->pic_url=="/image/gohan.jpg"){echo "selected"; }?>>海鮮丼</option>
              <option value="/image/tongue.jpg"<?php if($post->pic_url=="/image/tongue.jpg"){echo "selected"; }?>>牛タン丼</option>
              <option value="/image/wa.jpg"<?php if($post->pic_url=="/image/wa.jpg"){echo "selected"; }?>>和食</option>
              <option value="/image/ramen.jpg"<?php if($post->pic_url=="/image/ramen.jpg"){echo "selected"; }?>>ラーメン</option>
              <option value="/image/okonomi.jpeg"<?php if($post->pic_url=="/image/okonomi.jpeg"){echo "selected"; }?>>お好み焼き</option>
              <option value="/image/asia.jpg"<?php if($post->pic_url=="/image/asia.jpg"){echo "selected"; }?>>エスニック</option>
              <option value="/image/carry.jpg"<?php if($post->pic_url=="/image/carry.jpg"){echo "selected"; }?>>カレー</option>
              <option value="/image/pizza.jpg"<?php if($post->pic_url=="/image/pizza.jpg"){echo "selected"; }?>>ピザ</option>
              <option value="/image/itarian.jpeg"<?php if($post->pic_url=="/image/itarian.jpeg"){echo "selected"; }?>>イタリアン</option>
              <option value="/image/robstar.jpg"<?php if($post->pic_url=="/image/robstar.jpg"){echo "selected"; }?>>ロブスター</option>
              <option value="/image/omu.jpeg"<?php if($post->pic_url=="/image/omu.jpeg"){echo "selected"; }?>>オムライス</option>
              <option value="/image/fishandtips.jpg"<?php if($post->pic_url=="/image/fishandtips.jpg"){echo "selected"; }?>>フィッシュアンドチップス</option>
              <option value="/image/niku.jpg"<?php if($post->pic_url=="/image/niku.jpg"){echo "selected"; }?>>ステーキ</option>
              <option value="/image/nabe.jpeg"<?php if($post->pic_url=="/image/nabe.jpeg"){echo "selected"; }?>>鍋</option>
              <option value="/image/yakitori.jpg"<?php if($post->pic_url=="/image/yakitori.jpg"){echo "selected"; }?>>焼き鳥</option>
              <option value="/image/pancake.jpg"<?php if($post->pic_url=="/image/pancake.jpg"){echo "selected"; }?>>パンケーキ</option>
              <option value="/image/ice-frake.jpg"<?php if($post->pic_url=="/image/ice-frake.jpg"){echo "selected"; }?>>かき氷</option>
              <option value="/image/coffee.jpg"<?php if($post->pic_url=="/image/coffee.jpg"){echo "selected"; }?>>カフェ１</option>
              <option value="/image/cafe2.jpg"<?php if($post->pic_url=="/image/cafe2.jpg"){echo "selected"; }?>>カフェ２</option>
              <option value="/image/bar1.jpg"<?php if($post->pic_url=="/image/bar1.jpg"){echo "selected"; }?>>バー</option>
            </select>
          </div>
        <br>
        {!! Form::submit('編集', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/locales/bootstrap-datepicker.ja.min.js"></script>
<script type="text/javascript">

  var api = $('.date').datepicker({
  	format : 'yyyy-mm-dd',
  	language: 'ja',
  	todayHighlight: true,
  	autoclose: true,
  }).data('datepicker');
  
</script>

@endsection