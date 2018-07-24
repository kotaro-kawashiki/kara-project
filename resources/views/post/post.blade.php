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
  <body>
    <div class="col-xs-offset-1 col-xs-10 col-lg-offset-4 col-lg-4" id="hontai">
        <center><h1>記録をつける</h1></center>
      　<br>
        <div class="alert alert-success" role="alert">
          <strong>Notice</strong> 製品版では画像投稿が可能です。こうご期待！
        </div>
        {!! Form::model($post, ['route' => 'posts.store']) !!}
          <div class="form-group">
            <label name="went_at">日付*:</label>
            <div class='input-group date'>
                <input type='text' name="went_at" value='{{date("Y-m-d")}}' class="form-control" />
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
                      <input type="text" id="people" name="people_name[]" value="" placeholder='例:楽天太郎' class='form-control doukousya' >
                      </input>
                      <button type="input" class="btn btn-default" class="btn trash_btn ml10" value="" name="">
                              削除
                      </button>
                  </div>
                </div>
           </div>
           <button type="input" class="btn btn-default" class="btn bg-white mt10 miw100 add_btn" value="" name="">同行者を追加</button><br>
          <br>
          <div class="form-group">
            <!--{!! Form::label('pic_url', '写真:') !!}-->
            <label name="pic_url">写真:</label>
            <!--{!! Form::select('pic_url',['/image/gohan.jpg' => '海鮮丼', '/image/wa.jpg' => '和食','/image/pancake.jpg' => 'パンケーキ','/image/coffee.jpg' => 'カフェ','/image/pizza.jpg' => 'ピザ'], ['class' => 'form-control']) !!}-->
            <select name="pic_url" class="form-control">
              <option value="/image/susi1.jpg">寿司</option>
              <option value="/image/gohan.jpg">海鮮丼</option>
              <option value="/image/tongue.jpg">牛タン丼</option>
              <option value="/image/wa.jpg">和食</option>
              <option value="/image/ramen.jpg">ラーメン</option>
              <option value="/image/okonomi.jpg">お好み焼き</option>
              <option value="/image/asia.jpg">エスニック</option>
              <option value="/image/carry.jpg">カレー</option>
              <option value="/image/pizza.jpg">ピザ</option>
              <option value="/image/itarian.jpg">イタリアン</option>
              <option value="/image/robstar.jpg">ロブスター</option>
              <option value="/image/omu.jpg">オムライス</option>
              <option value="/image/fishandtips.jpg">フィッシュアンドチップス</option>
              <option value="/image/niku.jpg">ステーキ</option>
              <option value="/image/nabe.jpg">鍋</option>
              <option value="/image/yakitori.jpg">焼き鳥</option>
              <option value="/image/pancake.jpg">パンケーキ</option>
              <option value="/image/ice-frake.jpg">かき氷</option>
              <option value="/image/coffee.jpg">カフェ１</option>
              <option value="/image/cafe2.jpg">カフェ２</option>
              <option value="/image/bar1.jpg">バー</option>
            </select>
          </div>
          <h5>※実際にはここで自分で撮った写真を投稿できる予定です;)</h5>
          <br>
          {!! Form::submit('投稿', ['class' => 'btn btn-info']) !!}
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
</body>
@endsection