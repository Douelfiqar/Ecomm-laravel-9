@php

$admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        $categories = App\Models\Category::all();


@endphp
@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    Error page
@endsection



<div class="body-content outer-top-bd" style="margin-top:150px">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
					<p>We are sorry, the page you've requested is not available. </p>
					
					<a href="{{route('home')}}"><i class="fa fa-home"></i> Go To Homepage</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div>


@endsection
