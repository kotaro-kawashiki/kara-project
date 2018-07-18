            <!--you haven't logged in yet, you will see hare-->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kara-Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="top" class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
        
            @if (Route::has('login'))
                <div class="top-right">
                    @auth
                        <a href="{{ url('/calendar') }}">{{Form::image('image/buton3.png')}}</a>
                    @else
                        <br><br><h1><a href="{{ route('login') }}">{{Form::image('image/buton.png')}}</a></h1>
                        <h1><a href="{{ route('register') }}">{{Form::image('image/buton2.png')}}</a></h1>
                    @endauth
                </div>
            @endif
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
        <img class="title" src="/image/title4.png" alt="/image/title4.png">
        </div>
        </div>
    </body>
</html>
