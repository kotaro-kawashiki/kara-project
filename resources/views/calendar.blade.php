<!--©2018 FullCalendar LLC-->
@extends('layouts.app')
@section('content')
<head>
<style>
        body {
            background-image: url("/image/wood.jpg"); 
        }
</style>
</head>
    <div class="col-lg-offset-1 col-lg-6 col-sm-8 col-md-8 col-xs-12" id="calendar">
        @if($total==0)
            <div class = "firsttime">
                <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#sampleModal">
                	<h4><strong>◎初めての方はこちら</strong></h4>
                </button> 
            </div>
        @endif
      <div id="calendarpage">
          {!! $calendar_details->calendar() !!}
          <h4>カテゴリ分け：<a style="color:black; background: linear-gradient(transparent 30%, #aae 30%);">会社</a><a> , </a><a style="color:black; background: linear-gradient(transparent 30%, #bea 30%);">友達</a><a> , </a><a style="color:black; background: linear-gradient(transparent 30%, #aee 30%);">家族</a><a> , </a><a style="color:black; background: linear-gradient(transparent 30%, #eaa 30%);">そのほか</a></h4>
      </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-sm-4 col-md-4 col-xs-12" id="shiyougaku">
        <br>
        <h4>今月の使用額合計:</h4><center><h3 style="color:#e65c87;">{{$total}}円</h3></center>
        <div class="table-wrapper-scroll-y">
            <table class="table">
                @foreach($posts as $post)
                    <tr>
                        <th><?php echo substr($post->went_at,8,10)?>日</th>
                        <td>{{$post->restaurant}}</td>
                        <td>{{$post->cost}}円</td>
                    </tr>
                @endforeach
        </div>
    </div>
    
    <!--these link scripts are loading js file through http -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
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
				詳しい使い方は右上のヘルプボタンを押して説明を見てみましょう！
			</div>
			</center>
			
			<div class="modal-footer">
				<center><a class="btn btn-primary" href="{{route('posts.create')}}">記録をつける</a> </center>
			</div>
			
		</div>
	</div>
</div>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/ja.js"></script>
    
    {!! $calendar_details->script() !!}
@endsection
