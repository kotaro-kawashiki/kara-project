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
            <div class='panel'>
                <center><h2>ログイン</h2></center>
                <br>
                <br>

                <div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            <label for="userid" class="col-md-4 control-label">ユーザーid</label>

                            <div class="col-md-6">
                                <input id="userid" type="userid" class="form-control" name="userid" value="{{ old('userid') }}" required autofocus>

                                @if ($errors->has('userid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> パスワードを記憶
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    ログイン
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    パスワードを忘れた方はこちら
                                </a>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
