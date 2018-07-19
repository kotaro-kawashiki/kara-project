        <!--this file is a common object of view pages-->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>めし日和</title>
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery-3.3.1.js"></script> 
        
    　　<!--CSS-->
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div id="app">
            @include('commons.navbar')
            @auth
                @include('commons.error_messages')
            @endauth
            <!--this leads each view pages-->
            <br>
            <br>
            <br>
             @yield('content')
        </div>
        
        <!--this script is written in js/jquery and this is the function that add columns of friends on the post and edit pages-->
        <script>
            $( function() {
            	"use strict";
            	var $content = $( '.field:last-child' );
            	$( '.add_btn' ).on( 'click', function() {
            		$content.clone( true ).appendTo( '.parent' );
            		$('#people').val("");
    
            	} );
            	$( '.parent' ).on( 'click', '.trash_btn', function() {
            		$( this ).parents( '.field' ).remove();
            	} );
            } );
       
            function myFunction() {
            setTimeout(function(){ document.getElementById("form1").submit();}, 3000);   
            setTimeout(function(){ document.getElementById("form2").submit();}, 6000);   
            }
            
            
        </script>
    </body>
</html>
