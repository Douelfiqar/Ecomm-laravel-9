{{-- 

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Flipmart premium HTML5 & CSS3 Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.min.css')}}">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('client/assets/css/main.css')}}">
	    <link rel="stylesheet" href="{{asset('client/assets/css/blue.css')}}">
	    <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/owl.transitions.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/rateit.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/bootstrap-select.min.css')}}">

		

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('client/assets/css/font-awesome.css')}}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
@include('auth.body.header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Forgot your password?</h4>
                   
                    @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                    @endif
                    <form class="register-form outer-top-xs" method="POST" action="{{ route('password.email') }}>
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
                                <button class="btn btn-primary">Email Password Reset Link</button>
                            </div>
                    </form>					
                </div>
                
</div><!-- /.row -->
		</div><!-- /.sigin-in-->

</div>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
@include('auth.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('client/assets/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
	<script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('client/assets/js/echo.min.js')}}"></script>
	<script src="{{asset('client/assets/js/jquery.easing-1.3.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('client/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('client/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('client/assets/js/wow.min.js')}}"></script>
	<script src="{{asset('client/assets/js/scripts.js')}}"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="{{asset('switchstylesheet/switchstylesheet.js')}}"></script>
	
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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html> --}}















<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Flipmart premium HTML5 & CSS3 Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.min.css')}}">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('client/assets/css/main.css')}}">
	    <link rel="stylesheet" href="{{asset('client/assets/css/blue.css')}}">
	    <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/owl.transitions.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/rateit.css')}}">
		<link rel="stylesheet" href="{{asset('client/assets/css/bootstrap-select.min.css')}}">

		

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('client/assets/css/font-awesome.css')}}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
@include('auth.body.header')

<!-- ============================================== HEADER : END ============================================== -->
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
<!-- ============================================================= FOOTER ============================================================= -->
	<div >
		@include('auth.body.footer')
	</div>
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('client/assets/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
	<script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('client/assets/js/echo.min.js')}}"></script>
	<script src="{{asset('client/assets/js/jquery.easing-1.3.min.js')}}"></script>
	<script src="{{asset('client/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('client/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('client/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('client/assets/js/wow.min.js')}}"></script>
	<script src="{{asset('client/assets/js/scripts.js')}}"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="{{asset('switchstylesheet/switchstylesheet.js')}}"></script>
	
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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
