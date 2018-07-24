            <!--you haven't logged in yet, you will see hare-->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>めし日和</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            img {

                width: 91%;
            }
            #phonebutton {
                display: none !important; 
            }
            #phonetitle {
                display: none !important; 
            }
            @media only screen and (max-width: 750px) {
                .top-right { display: none !important; }
                #button { display: none !important; }
                #pctitle { display: none !important; }
                #phonebutton{ display: block !important; }
                #phonetitle{ display: block !important; }
            }
        </style>
    </head>
    <body>
        <div id="top" class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
            @if (Route::has('login'))
                <div class="top-right">
                    @auth
                        <h1><a href="{{ url('/calendar') }}">{{Form::image('image/buton3.png')}}</a></h1>
                    @else
                        <br><br><h1><a href="{{ route('login') }}">{{Form::image('image/buton.png')}}</a></h1>
                        <h1><a href="{{ route('register') }}">{{Form::image('image/buton2.png')}}</a></h1>
                    @endauth
                </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <center><img class="title" src="/image/title5.png" alt="/image/title5.png"></center>
            </div>
        </div>
        <div id="pctitle" class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
            <center><img class="title" src="/image/setsumei1.png" alt="/image/setsumei1.png"></center>
            <center><img class="title" src="/image/setsumei2.png" alt="/image/setsumei2.png"></center>
        </div>
        <div id="phonetitle" class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
            <center><img class="title" src="/image/phonetitle1.png" alt="/image/phonetitle1.png"></center>
            <center><img class="title" src="/image/phonetitle2.png" alt="/image/phonetitle2.png"></center>
        </div>
        
        <div id="button">
            <center><a href="{{ route('register') }}">{{Form::image('image/buton4.png')}}</a></center>
        </div>
        <div id="phonebutton">
            <center><a href="{{ route('register') }}">{{Form::image('image/buton6.png')}}</a></center>
            <center><a href="{{ route('login') }}">{{Form::image('image/buton7.png')}}</a></center>
        </div>
        <footer><center>2018 ©kara-age</center></footer>
    </body>
</html>
