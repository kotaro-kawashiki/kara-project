@extends('layouts.app')

@section('content')


@foreach($unique as $value)
<br>
{{$value}}
<br>
@endforeach


@endsection