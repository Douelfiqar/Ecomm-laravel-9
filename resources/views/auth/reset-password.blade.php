{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


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


<div class="breadcrumb" >
	<div class="container" >
		<div class="breadcrumb-inner" >
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content" style="margin-bottom:100px" >
	<div class="container">
		<div class="sign-in-page">
			<div class="row ">
				<!-- Sign-in -->	
                <div class="col-md-3">
                    </div>		
                <div class="col-md-6">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
            
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
                        <div class="block">
                            <label for="password">Email</label>
                            <input type="email" name="email" :value="old('email', $request->email)" required autofocus class="form-control unicase-form-control text-input">
                        </div>
            
                        <div class="mt-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input">
                        </div>
            
                        <div class="mt-4">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input">
                        </div>
                        
                        <div class="col-md-5">

                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" style="margin-top: 15px" class="btn btn-success">Reset Password</button>
                        </div>

                    </div>
                    


                    </form>
                </div>

	</div>
		</div>
			</div>


@endsection
