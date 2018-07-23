        <!--Once you log in, you will be this page-->
@extends('layouts.app')

@section('content')
<head>
<style>
        body {background-image: url("/image/wood.jpg"); }
        #calendar {
            margin-top: 0px;
            padding: 0px 0px 0px 0px;
            background-color: #fffcfc;
            border-radius: 10%;
        }
        #shiyougaku {
            margin-top: 5%;
            margin-left: 1%;
            background-color: #fffcfc;
            border-radius: 5%;
        }
</style>
</head>
    <div class="col-lg-offset-1 col-lg-6 col-sm-7 col-md-7 col-xs-12" id="calendar">

    @if($total==0)
    <div class = "firsttime">
        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#sampleModal">
        	◎初めての方はこちら
        </button> 
    </div>
    @endif
      <div id="calendarpage">
          <!--©2018 FullCalendar LLC-->
          {!! $calendar_details->calendar() !!}
      </div>
    </div>

    <div class="col-lg-4 col-sm-4 col-sm-4 col-md-4 col-xs-offset-1 col-xs-10" id="shiyougaku">
        <h4>今月の使用額合計:</h4><center><h3 style="color:#e65c87;">{{$total}}円</h3></center>
        <div class="table-wrapper-scroll-y">
            <table class="table">
                @foreach($posts as $post)
                    <tr>
                        <th><?php echo substr($post->went_at,8,10)?>日</th>
                        <td>{{$post->restaurant}}({{$post->cost}}円)</td>
                    </tr>
                @endforeach
        </div>
    </div>
    
    <!--these link scripts are loading js file through http -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/ja.js"></script>
    
    {!! $calendar_details->script() !!}

 モーダル・ダイアログ 
<div class="modal fade" id="sampleModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
			<center>
			<h4 class="modal-title">初めまして！</h4>
			</center>
			</div>
			<center>
			<div class="modal-body">
				☆ご登録ありがとうございます☆<br>
				『記録をつける』 をクリックして、外食の記録を始めてみましょう！<br>
			</div>
			</center>
			
			<div class="modal-footer">
				<center><a class="btn btn-primary" href="{{route('posts.create')}}">記録をつける</a> </center>
			</div>
			
		</div>
	</div>
</div>

<div class="modal fade" id="sampleModal2" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
			<center>
			<h4 class="modal-title">使い方</h4></h4>
			</center>
			</div>
			<center>
			<div class="modal-body">
				『記録をつける』</br>
				  行ったお店や一緒に行った人、使った金額、お店についてのコメントなどを記録します。その日に撮った写真も一緒に投稿してみましょう！<br><br>
				『カレンダー』<br>
				  投稿の詳細ページへ行くことができます。誰と行ったのか、どんなお店だったのかなどの細かい情報まで確認したいときに活用しましょう。<br><br>
				『投稿一覧』<br>
				  投稿の一覧をタイムライン形式で確認することができます。行ったお店や使った金額をパッと確認したいときに便利です。検索機能もあるので、特定の投稿を探すことも可能です。<br><br>
				『お気に入り』<br>
				  また行きたい！と思ったお店や思い出深い記録はお気に入りして、自分だけの『お気に入りリスト』を作りましょう！<br><br>
				『人リスト』<br>
				  誰とどこに何回行ったかを確認することができます。久しぶりのあの人やおなじみのあの人と、素敵なお店に行きましょう！<br><br>
				『編集機能』<br>
				  記録内容を間違えてしまっても大丈夫！各投稿は編集できるので、正確な情報を記録していきましょう。<br><br>
				『外食費管理』<br>
				  外食で使った金額の月ごとの合計が確認できるので、外食費の管理にも活用できます。<br><br><br>
				
				賢く楽しい外食ライフを！
			</div>
			</center>
			
			<div class="modal-footer">
				<center><a class="btn btn-primary" href="{{route('posts.create')}}">記録をつける</a> </center>
			</div>
			
		</div>
	</div>
</div>
@endsection
