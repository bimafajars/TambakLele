@extends('layouts.logreg')
@section('content')
<br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-4" style="text-align:center;">
            <a href="#" class="logo">
                <img src="{{ asset('Atlantis/assets/img/logo1.svg')}}" alt="Tambak Udang" class="navbar-brand" style="height: 70px;">
            </a>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="max-height:310px;">
                <div class="wrapper wrapper-login">
                    <div class="container container-login animated fadeIn">
                        <br>
                        <h3 class="text-center">Login</h3>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                        <div class="login-form">
                            <div class="form-group form-floating-label">
                                <input id="email" name="email" type="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                <label for="email" class="placeholder">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group form-floating-label">
                                <input id="myInput" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                                <label for="password" class="placeholder">Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row form-sub ml-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="showpassword" onclick="showPassword()">
                                    <label class="custom-control-label" for="showpassword">Show Password</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-action mb-3" style="text-align:center">
                                <button type="submit" class="btn btn-lg btn-primary btn-rounded btn-login">Login</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    function showPassword() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
    
@endsection
@endsection
