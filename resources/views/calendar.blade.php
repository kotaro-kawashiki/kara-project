        <!--Once you log in, you will be this page-->

@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
      外食履歴<h3>今月の使用額合計は{{$total}}円です！</h3>
      </div>
  <div class="panel-body" >
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
