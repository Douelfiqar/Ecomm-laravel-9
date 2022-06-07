<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="{{url('/auth/facebook/redirect')}}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="{{route('google.login')}}" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	@if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
    @endif
	<form class="register-form outer-top-xs" method="POST" action="{{ route('login') }}">
		@csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email">
		</div>
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong style="color: red">{{$message}}</strong>
        </span>
        @enderror
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" name="password" >
		</div>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong style="color: red">{{$message}}</strong>
        </span>
        @enderror
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" name="remember">Remember me! 
		  	</label>
		  	<a href="{{route('forgotPassword')}}" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
		 @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
        @endif
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>					
</div>
