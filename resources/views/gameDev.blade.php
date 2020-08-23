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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">ABOUT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/gameDev') }}">GAME DEV</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/2dworks') }}">2D WORKS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/3dworks') }}">3D WORKS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blog') }}">BLOG</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">CONTACT</a>
                  </li>
                </ul>
                <span class= "nav-right">
                    <ul class="navbar-nav mr-auto">
                    @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a  class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                                @endif
                            @endauth
                    @endif
                    </ul>
              </span>
            </div>
          </nav>



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
