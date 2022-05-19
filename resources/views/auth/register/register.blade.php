<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
        @csrf
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input class="form-control unicase-form-control text-input" id="exampleInputEmail2" type="email" name="email" :value="old('email')" required>
	  	</div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong style="color: red">{{$message}}</strong>
            </span>
        @enderror
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="name" :value="old('name')" required autofocus autocomplete="name">
		</div>
        @error('name')
        <span class="invalid-feedback" role="alert">
                <strong style="color: red">{{$message}}</strong>
        </span>
        @enderror
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" type="password" name="password" required autocomplete="new-password">
		</div>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong style="color: red">{{$message}}</strong>
        </span>
        @enderror
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input class="form-control unicase-form-control text-input" id="exampleInputEmail1" type="password" name="password_confirmation" required autocomplete="new-password" >
		</div>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
                <strong style="color: red">{{$message}}</strong>
        </span>
        @enderror
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>
	
	
</div>	
