@extends('admin.adminMaster')

@section('contentadmin')

<div class="container-full">
    
    <section class="content">
            <div class="row">
                <div class="box box-widget widget-user p-4">
					@if(Session::has('success'))
          			  <div class="alert alert-success" role="alert">
            		    {{Session::get('success')}}
             		  </div>
     			    @endif

					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">Admin name: {{$user->name}}</h3>
					  <h6 class="widget-user-desc">Email: {{$user->email}}</h6>
                      <div class="d-flex flex-column row float-right mb-5" style="margin-top: -40px">
						<a href="{{route('admin.editProfile')}}" class="btn btn-success float-right col-md-12 mb-2" >Update Profile</a>
						<a href="{{route('update.password')}}" class="btn btn-warning float-right col-md-12">Update Password</a>
					  </div>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{(empty($user->profile_photo_path)?url('upload/adminPhoto/no_image.jpg'):url('upload/adminPhoto/'.$user->profile_photo_path))}}" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
            </div>

			
    </section>
</div>    
@endsection
