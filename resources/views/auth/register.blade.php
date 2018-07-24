@extends('layouts.app')

@section('content')
<head>
<style>
    body {background-image: url("image/wall.jpg"); }
    .panel {
    filter:alpha(opacity=80);
    -moz-opacity: 0.8;
    opacity: 0.8;
    }
</style>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <br>
            <br>
               <div class='panel'>
                <center><h2>新規登録</h2></center>
                <br>
                <center><img src="/image/icon2.jpg" alt="/image/icon2.jpg"></center>
                <br>
                <br>

                <div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class="col-lg-offset-3 col-lg-6 col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ユーザー名"required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            

                            <div class="col-lg-offset-3 col-lg-6 col-md-6">
                                <input id="userid" type="userid" class="form-control" name="userid" value="{{ old('userid') }}" placeholder="ユーザーid"required>

                                @if ($errors->has('userid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <div class="col-lg-offset-3 col-lg-6 col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="パスワード"required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-lg-offset-3 col-lg-6 col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="パスワード(確認用）"required>
                            </div>
                        </div>

                        <center><div class="form-group">
                            <div class="col-md-6 col-md-offset-4 col-lg-offset-5 col-lg-2">
                                <button type="submit" class="btn btn-info">
                                    登録
                                </button>
                            </div>
                        </div></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
