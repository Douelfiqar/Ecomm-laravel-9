@extends('admin.adminMaster')

@section('contentadmin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

<section class="content">
   <form action="{{route('admin.updateProfile')}}" method="POST" enctype="multipart/form-data">
    <div class="box box-widget widget-user p-5">
        @csrf

        <div class="p-5">

            <div class="row d-flex justify-content-center p-5">

                <div class="input-group mb-3 col-md-5">
                <span class="input-group-text" id="basic-addon1">Admin Name *</span>
                <input type="name" name="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{$user->name}}" required>
                </div>
  
               

                <div class="input-group mb-3 col-md-5">
                    <span class="input-group-text" id="basic-addon1">Email *</span>
                    <input type="email" name="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{$user->email}}" required>
                </div>

            </div>


         <div class="d-flex">
            <div class="input-group mb-3 p-5 row">

                <div class="col-md-1">
                </div>
    
                <div class="d-flex justify-content-center col-md-5" style="height: 35px">  
                <span class="input-group-text" id="basic-addon1">Profile picture *</span>      
                <input type="file" class="form-control" id="image" value="{{(empty($user->profile_photo_path)?url('upload/adminPhoto/no_image.jpg'):url('upload/adminPhoto/'.$user->profile_photo_path))}}" name="profilePicture">
                </div>
    
                <div class="col-md-3 ml-4">
                    <img src="{{(empty($user->profile_photo_path)?url('upload/adminPhoto/no_image.jpg'):url('upload/adminPhoto/'.$user->profile_photo_path))}}" style="width: 100px;height:100px" alt="" id="showImage">
                </div>
                
              </div>
              
              
         </div>

    </div>  

    <div class="row d-flex justify-content-center p-5">
        <button type="submit" class="btn btn-success col-md-3">Update</button>
        <a href="#" onclick="window.history.go(-1);" class="btn btn-primary col-md-3 ml-3">Back</a>
            

    </div>  
</div>  
   </form>

</section>

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
@endsection
