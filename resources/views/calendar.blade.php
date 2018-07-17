        <!--Once you log in, you will be this page-->

@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  
      <div id="calendarpage">
      <!--©2018 FullCalendar LLC-->
      {!! $calendar_details->calendar() !!}
      
              <div class="panel-heading">
                  <h4>今月の使用額合計:{{$total}}円</h4>
              </div>
      </div>
</div>


<!--these link scripts are loading js file through http -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script src='locale/ja.js'></script>



{!! $calendar_details->script() !!}


 
@endsection
