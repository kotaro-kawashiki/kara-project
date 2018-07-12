        <!--Once you log in, you will be this page-->

@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  
      
      <!--©2018 FullCalendar LLC-->
      {!! $calendar_details->calendar() !!}
</div>


<!--these link scripts are loading js file through http -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
 
{!! $calendar_details->script() !!}
 
@endsection
