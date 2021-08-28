<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>

.container {
    max-width: 514px;
    margin-top: 148px;
}
.btn-primary {
    background: #151375;
    width: 485px;

}
    </style>

<!------ Include the above in your HEAD tag ---------->
<div class="container">


<h3 style="color: #141375;">Log In</h3>
<h6>Sign in to start your session</h6>
</br>
@if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
<form method="POST" action="{{ route('login') }}">
            @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="email" id="email"  name="email" :value="old('email')" required autofocus placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" id="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox"  >
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    @if (Route::has('password.request'))
                    <a style=" margin-left: 174px;" class="underlineHover" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

  
</form>

</diV>