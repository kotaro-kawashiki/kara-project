        <!--Once you log in, you will be this page-->
@extends('layouts.app')

@section('content')
<head>
<style>
        /*body {background-image: url("/image/shower.jpg"); }*/
        #calendar {
            margin-top: 0px;
            /*background-color: white;*/
        }
        #shiyougaku {
            margin-top: 5%;
        }
</style>
</head>
    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12" id="calendar">
      <div id="calendarpage">
          <!--©2018 FullCalendar LLC-->
          {!! $calendar_details->calendar() !!}
      </div>
    </div>
    <div class="col-lg-4 col-sm-4 col-sm-4 col-md-4 col-xs-offset-1 col-xs-10" id="shiyougaku">
        <h4>今月の使用額合計:{{$total}}円</h4>
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
