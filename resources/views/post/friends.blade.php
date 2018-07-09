@extends('layouts.app')

@section('content')


@foreach($peoples2 as $key=>$people)
<br>
{{$people}}
<br>
@endforeach


@endsection