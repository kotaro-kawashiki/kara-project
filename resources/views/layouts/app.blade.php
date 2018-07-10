        <!--this file is a common object of view pages-->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kara-Project</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.3.1.js"></script> 
    
        
</head>
<body>
    <div id="app">
        @include('commons.navbar')
        @include('commons.error_messages')
        <!--this leads each view pages-->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script>
        
        $( function() {
	"use strict";
	var $content = $( '.field:last-child' );
	$( '.add_btn' ).on( 'click', function() {
		$content.clone( true ).appendTo( '.parent' );
	} );
	$( '.parent' ).on( 'click', '.trash_btn', function() {
		$( this ).parents( '.field' ).remove();
	} );
} );
    </script> 
    
    <script>
function myFunction() {
setTimeout(function(){ document.getElementById("form1").submit();}, 3000);   
setTimeout(function(){ document.getElementById("form2").submit();}, 6000);   
}
</script>
</body>
</html>
