<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link   rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Nunito:200,600') }}">
        <!-- Styles -->

        <link   rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link   rel="stylesheet" href="{{ asset('css/body.css') }}">

    </head>
    <body>
         <!-- Navbar -->
         <header>
            @include('includes.header')
        </header>


        <!-- Canvas for 3D Elements -->
        <canvas id="c"></canvas>

        <!-- Scripts -->
        <script>document.body
            .className += ' fade-out';</script>
        <script  type="text/javascript" src="{{ URL::asset("https://unpkg.com/typewriter-effect@latest/dist/core.js") }}"></script>
        <script   type="module" src="{{ asset('js/threeDbackground.js') }}"></script>
        <script   type="module" src="{{ asset('js/dialogueBox.js') }}"></script>



        <div class="flex-center position-ref full-height">

            <!-- Title Card-->
            <section id="TitlePage">

                <!-- Title Graphic -->
                <!-- Start Button -->
                <div id= "startButton" class = "flex-container" >
                    <a href="#" class="myButton">START</a>
                </div>
                <!-- Dialogue Box -->
                <div id = "dialogueBox" >
                    <span class= "user-no-touch" style= "color: white" id="dialogueBox-text">
                        Cat mew mew mew meow
                    </span>
                </div>

            </section>
        </div>


        </section>

        <script   type="module" src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
