@php

$categories = App\Models\Category::all();
$user = Auth::user();
        $categories = App\Models\Category::all();
        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }

@endphp

@extends('client.clientMaster')

@section('clientDynamique')

@include('client.body.brand')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forgot password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Forgot your password?</h4>
                   
                    @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                    @endif
                    <form class="register-form outer-top-xs" method="POST" action="{{ route('password.email') }}" >
                        @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" :value="old('email')" required autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{$message}}</strong>
                            </span>
                            @enderror
                
                           
                            <div>
                                <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                            </div>
                    </form>		
                   						
                </div>


<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		</div><!-- /.container -->
</div><!-- /.body-content -->


<script>
	$(document).ready(function(){ 
		$(".changecolor").switchstylesheet( { seperator:"color"} );
		$('.show-theme-options').click(function(){
			$(this).parent().toggleClass('open');
			return false;
		});
	});

	$(window).bind("load", function() {
	   $('.show-theme-options').delay(2000).trigger('click');
	});
</script>

@endsection
