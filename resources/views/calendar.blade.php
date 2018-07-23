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
    
    <!--these link scripts are loading js file through http -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/ja.js"></script>
    
    {!! $calendar_details->script() !!}

@endsection
