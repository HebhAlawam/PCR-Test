@extends('auth.main')

@section('title')
		Login
@endsection

@section('content')
<div class="row ">
    <div class="col-lg-4 col-md-12 m-auto form ">
       <div class="form_box type_one ">
        <h2>Login</h2>
          <form method="POST" action="{{ route('login') }}" >
          @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" 
                name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password"
               placeholder="Password" >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
               
              <!-- /.col -->
            </div>
          </form>
          <!-- 
          <p class="mb-1">
            <a class="acolor" href="forgot-password.html">I forgot my password</a>
          </p>
          -->
          <p class="mb-0">
            <a class="acolor" href="{{route('register')}}" class="text-center">Register a new membership</a>
          </p>
        </div>
    </div>
  </div>
 
@endsection
