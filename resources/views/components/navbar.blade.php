<!-- Back to top button -->
@props(['section'])
<div class="back-to-top"></div>
<header>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 text-sm">
          <div class="site-info">
            <a href="#"><span class="mai-call text-primary"> +63 949 717 9366</span></a>
            <span class="divider">|</span>
            @auth
                <a href="#"><span class="mai-mail text-primary"></span>{{ auth()->user()->email }}</a>
            @else
                <a href="#"><span class="mai-mail text-primary"></span> no user </a>
            @endauth
          </div>
        </div>
        <div class="col-sm-4 text-right text-sm">
          <div class="social-mini-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-dribbble"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .topbar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

      <form action="#">
        <div class="input-group input-navbar">
          <div class="input-group-prepend">
            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
          </div>
          <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctors.html">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.html">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>

        @auth
        <form action="/logout" method="post">
            @csrf
            <div class="dropdown">
              <button class="btn btn-primary ml-lg-3 text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </button>
              <ul class="dropdown-menu">
                <a href="/appointment/show">
                  <li type="button" class="btn">
                    @php
                        $id = auth()->user()->id;
                        $count = App\Models\Appointment::where('user_id',$id)->count();
                    @endphp
                    Appointment <span class="badge text-bg-primary ms-3">{{ $count }}</span>
                  </li>
                </a>
                <form action="/logout" method="post">
                  @csrf
                  <li><button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</a></button>
                </form>
              </ul>
            </div>
        </form>
        @else
        <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="/register">Register</a>
            <a class="btn btn-primary ml-lg-3" href="/login">Login</a>
        </li>
        @endauth
        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
</header>

