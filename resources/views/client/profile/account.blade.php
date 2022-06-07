@extends('client.clientMaster')

@section('clientDynamique')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="body-content" style="margin-top:70px">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div>
                    <img src="{{(empty($user->profile_photo_path)?url('upload/clientPhoto/no_image.jpg'):url('upload/clientPhoto/'.$user->profile_photo_path))}}" alt="user Avatar" style="border-radius: 75%;margin-top:25px;margin-left:20px;width:150px;height:150px;object-fit:contain" id="showImage">
            
                    
                    <ul class="mr-5" style="margin-top: 10px" >
                        <div class="row">
                            <div class="col-md-1"></div>
                            <li><a href="{{route('home')}}" class="btn btn-success col-md-7" style="margin-top: 10px">Home</a></li>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <li><button class="btn btn-warning col-md-7" style="margin-top: 10px" id="profileInfoBtn">Profile Update</button></li>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <li><a href="{{route('profile.trackOrder')}}" class="btn btn-info col-md-7" style="margin-top: 10px">Track Order</a></li>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <li><button class="btn btn-primary col-md-7 text-center" style="margin-top: 10px" id="passwordInfoBtn">Change Password</button></li>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-1"></div>
                            
                            <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger col-md-7" style="margin-top: 10px">Logout</button>
                            </form></li>
                        </div>
                       
            
                    </ul>
                </div>
            
            </div>
            <div class="col-md-4">
                <section class="content" style="margin-top: 160px;margin-left:70px" id="profileInfo">

                    <form action="{{route('client.updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                     <div class="box box-widget widget-user" >
                         
                 
                         <div class="p-5">
                 
                             <div>
                 
                                 <div class="input-group mb-3 col-md-11">
                                 <span class="input-group-text" id="basic-addon1">UserName *</span>
                                 <input type="name" name="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{$user->name}}" required>
                                 </div>
                   
                                
                 
                                 <div class="input-group mb-3 col-md-11">
                                     <span class="input-group-text" id="basic-addon1">Email *</span>
                                     <input type="email" name="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{$user->email}}" required>
                                 </div>
                 
                             </div>
                 
                 
                          <div class="d-flex">
                             <div class="input-group mb-3 p-5 row">
                 
                                
                     
                                 <div class="d-flex justify-content-center col-md-11" style="height: 35px">  
                                 <span class="input-group-text" id="basic-addon1">Profile picture *</span>      
                                 <input type="file" class="form-control" id="image" value="{{(empty($user->profile_photo_path)?url('upload/adminPhoto/no_image.jpg'):url('upload/adminPhoto/'.$user->profile_photo_path))}}" name="profilePicture">
                                 </div>
                     
                                 
                                 
                               </div>
                               
                               
                          </div>
                 
                     </div>  
                        <div class="row" style="margin-top:45px">

                         <div class="col-md-4"></div>
                         <button type="submit" class="btn btn-success col-md-3" >Update</button>
                     </div>  
                 </div>  
                    </form>
                 


                 </section>
                 
            </div>

            <div class="col-md-4" style="margin-top: 160px;"  id="passwordInfo">
                <section class="content">
                    <div class="box box-widget widget-user">
            
                        @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                Please verify your information !
                              </div>
                        @endif
                        <form action="{{route('client.editPassword')}}" method="POST">
            @csrf
                        <div class="container box box-widget widget-use">
                            <div class="row">

                                <div class="row">
                                    <div class="col-md-4">
                                        <span for="Password" class="col-md-10">Old Password *</span>
                                         

                                        <input type="password" name="oldPassword" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            

                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <span for="Password" class="col-md-10">New Password *</span>   
                                        
                                        <input type="password" name="newPassword" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>

                                    </div>
                                </div>
                            
            
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <span for="Password" class="col-md-10">Confirm Password *</span>
                                        {{-- <input type="password" name="confirmPassword" class="orm-control col-md-4" aria-label="Username" aria-describedby="basic-addon1">  --}}

                                        <input type="password" name="confirmPassword" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                        
                                    </div>
                                </div>
            
                            <div class="row d-flex" style="margin-left:10px">
                                
                                <div class="col-md-1">

                                </div>
                                <button type="submit" class="btn btn-success col-md-1 text-center" style="margin-top: 30px">Update</button>
                                
                            </div>

                           <div>
                        </div>
            
            
                       </form>
            


                       
                    </div>
            


                    
            </section>
            </div>
        </div>
    </div>
</div>
<div id="brands-carousel" class="logo-slider wow fadeInUp" style="margin-top: 100px">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand1.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand2.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand3.png')}}" src="{{asset('clientassets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand4.png')}}" src="{{('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand5.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand6.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand2.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand4.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand1.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('client/assets/images/brands/brand5.png')}}" src="{{asset('client/assets/images/blank.gif')}}" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){

            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);

        })
    })
</script>

<script>
    var tst = $('#profileInfoBtn')
    $('#passwordInfo').hide()

tst.on('click',function(){
    $('#passwordInfo').hide()
    $('#profileInfo').show()
})

$('#passwordInfoBtn').on('click',function(){
    $('#passwordInfo').show()
    $('#profileInfo').hide()
})

</script>
@endsection
