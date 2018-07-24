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
     <h1>投稿の編集</h1>
     <br>
    <!--足しました-->
  <div class="alert alert-success" role="alert">
    <strong>Notice</strong> 製品版では画像投稿が可能です。こうご期待！
  </div>
    <h5><a href="{{ route('posts.show', ['id' => $post->id]) }}">
     <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>詳細へ</a></h5>
     <h5><a href="{{ route('posts.store') }}">
     <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>投稿一覧へ</a></h5>
  <br>
    {!! Form::model($post, ['route' => ['posts.update',$post->id],'method'=>'put']) !!}
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
            {!! Form::label('restaurant', '店名*:') !!}
            {!! Form::text('restaurant', null, ['class' => 'form-control','placeholder'=>'例：鳥貴族']) !!}
        </div>
        <div class="form-group">        
            {!! Form::label('cost', '値段*:') !!}
            {!! Form::number('cost', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('comments', 'コメント:') !!}
            {!! Form::text('comments', null, ['class' => 'form-control']) !!}
        </div>
        <div class="parent">
             @foreach($people as $user_people)
            <div class="field form-inline" style="padding-bottom:4px; margin-bottom:10px;">
                <div class="form-group">
                    {!! Form::label('people_name', '同行者:',['class']) !!}
                   
                    <input type="text" id="people" name="people_name[]" value="{{$user_people}}" placeholder='例:楽天太郎' class='form-control doukousya' >
                    </input>
                    
                    <button type="button" class="btn btn-default trash_btn ml10" value="" name="">
                            削除
                    </button>
                </div>
              </div>
              @endforeach
         </div>
    <button type="button" class="btn btn-default bg-white mt10 miw100 add_btn" value="" name="">同行者を追加</button>
        <div class="form-group">
            <label name="pic_url">写真:</label>
            <select name="pic_url" class="form-control">
              <option value="/image/susi1.jpg">寿司</option>
              <option value="/image/gohan.jpg">海鮮丼</option>
              <option value="/image/tongue.jpg">牛タン丼</option>
              <option value="/image/wa.jpg">和食</option>
              <option value="/image/ramen.jpg">ラーメン</option>
              <option value="/image/okonomi.jpeg">お好み焼き</option>
              <option value="/image/asia.jpg">エスニック</option>
              <option value="/image/carry.jpg">カレー</option>
              <option value="/image/pizza.jpg">ピザ</option>
              <option value="/image/itarian.jpeg">イタリアン</option>
              <option value="/image/robstar.jpg">ロブスター</option>
              <option value="/image/omu.jpeg">オムライス</option>
              <option value="/image/fishandtips.jpg">フィッシュアンドチップス</option>
              <option value="/image/niku.jpg">ステーキ</option>
              <option value="/image/nabe.jpeg">鍋</option>
              <option value="/image/yakitori.jpg">焼き鳥</option>
              <option value="/image/pancake.jpg">パンケーキ</option>
              <option value="/image/ice-frake.jpg">かき氷</option>
              <option value="/image/coffee.jpg">カフェ１</option>
              <option value="/image/cafe2.jpg">カフェ２</option>
              <option value="/image/bar1.jpg">バー</option>
            </select>
          </div>
        <h5>※写真を変えない場合でももう一度選びなおしてください</h5><br><br>
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