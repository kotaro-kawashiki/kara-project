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
            <div class='panel'>
                <center><h2>ログイン</h2></center>
                <center><img src="/image/icon.jpg" alt="/image/icon.jpg"></center>
                <div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="padding:10px;">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            <div class="col-lg-offset-3 col-lg-6 col-md-6 col-md-offset-3">
                                <input id="userid" type="userid" class="form-control" name="userid" value="{{ old('userid') }}" placeholder="ユーザーid" required autofocus>
                                @if ($errors->has('userid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-lg-offset-3 col-lg-6 col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" placeholder="パスワード" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3 col-lg-offset-5 col-lg-2">
                                    <center>
                                        <button type="submit" class="btn btn-info">
                                            ログイン
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                    <center>
                        <a data-toggle="modal" data-target="#exampleModal">モバイル版はこちら</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QRコード表示用モーダル -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
