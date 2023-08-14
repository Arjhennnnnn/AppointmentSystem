<div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
      <div class="card" style="width: 30rem; margin-left:280px;">
          <div class="card-body">

              <h1 class="fw-bold text-success">Sign In</h1>
              <p class="text-start ms-3">Create new account <a href="/register">here</a></p>
              @error('email')
              <p class="text-danger text-start ms-3">{{ $message }}</p>
              @enderror
              <form action="/process" method="post">
                @csrf
                <div class="col-12 py-2 wow fadeInLeft w-100">
                  <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                </div>

                <div class="col-12 py-2 wow fadeInRight w-100">
                  <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>

                <div class="col-12 py-2 wow fadeInRight w-100">
                  <input type="submit" class="btn btn-primary w-100" value="Login">
                </div>
              </form>
          </div>
          </div>
      </div>
    </div>
  </div>