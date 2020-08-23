
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
