<div class="page-hero bg-image overlay-dark mb-5" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
      <div class="card" style="width: 30rem; margin-left:280px;">
          <div class="card-body">
              <h1 class="fw-bold text-success">Sign Up</h1>
              <p class="text-start ms-3">Sign in your account <a href="/login">here</a></p>

              @if(session()->has('message'))
                  <div class="col-12 alert alert-success w-100" role="alert">
                      {{ session('message') }}
                  </div>
              @endif

              <form action="/store" method="post">
                  @csrf
                  <div class="col-12 py-2 wow fadeInLeft w-100">
                      <input type="text" class="form-control" name="name" placeholder="FullName">
                  </div>
                  <div class="col-12 py-2 wow fadeInRight w-100">
                      <input type="email" class="form-control" name="email" placeholder="Email Address">
                  </div>
                  <div class="col-12 py-2 wow fadeInLeft w-100">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="col-12 py-2 wow fadeInRight w-100">
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <div class="col-12 py-2 wow fadeInRight w-100">
                      <button type="submit" class="btn btn-primary w-100">Register</button>
                  </div>
              </form>
          </div>
          </div>
      </div>
    </div>
  </div>