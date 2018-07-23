        <!--this file is a common object of view pages-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>めし日和</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <!--js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery-3.3.1.js"></script> 
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
    　　<!--CSS-->
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
       
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            Start Bootstrap
                        </a>
                    @guest
                        <li><a href="{{ route('login') }}">ログイン</a></li>
                        <li><a href="{{ route('register') }}">新規登録</a></li>
                    @else
                        </li>
                        <li>
                            <a href="{{route('posts.create')}}"><span class="glyphicon glyphicon-pencil"></span> 記録をつける</a>
                        </li>
                        <li>
                            <a href="{{url('/calendar')}}"><span class="glyphicon glyphicon-calendar"></span> カレンダー</a>
                        </li>
                        <li>
                            <a href="{{route('posts.index')}}"><span class="glyphicon glyphicon-list-alt"></span> 投稿一覧 & 検索</a>
                        </li>
                        <li>
                            <a href="{{route('users.favos',['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-star-empty"></span> お気に入り</a>
                        </li>
                        <li>
                            <a href="{{route('people.index')}}"><span class="glyphicon glyphicon-user"></span> 人リスト</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"></span> ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            @include('commons.navbar')
            @auth
                @include('commons.error_messages')
            @endauth
            <!--this leads each view pages-->
             @yield('content')
        </div>
        
        <!--this script is written in js/jquery and this is the function that add columns of friends on the post and edit pages-->
        <script>
            $( function() {
            	"use strict";
            	var $content = $( '.field:last-child' );
            	$( '.add_btn' ).on( 'click', function() {
            		$content.clone( true ).appendTo( '.parent' );
            		$('.doukousya:last').val("");
    
            	} );
            	$( '.parent' ).on( 'click', '.trash_btn', function() {
            		$( this ).parents( '.field' ).remove();
            	} );
            } );
            
            function myFunction() {
            setTimeout(function(){ document.getElementById("form1").submit();}, 3000);   
            setTimeout(function(){ document.getElementById("form2").submit();}, 6000);   
            }
            
            
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>
