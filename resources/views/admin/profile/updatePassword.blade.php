@extends('admin.adminMaster')

@section('contentadmin')

<section class="content">
        <div class="box box-widget widget-user d-flex justify-content-center align-items-center p-5">

            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    Please verify your information !
                  </div>
            @endif
            <form action="{{route('admin.editPassword')}}" method="POST" class="p-5">
@csrf
            <div class="container p-5">
                <div class="row">
                    <div class="col-md-12">
                        <span for="Password">Old Password *</span>
                        <input type="text" name="oldPassword" id="" class="input-group-text" required>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span for="Password">New Password *</span>
                        <input type="text" name="newPassword" id="" class="input-group-text" >    
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <span for="Password">Confirm Password *</span>
                        <input type="text" name="confirmPassword"class="input-group-text">    
                    </div>
                </div>

                <div class="row d-flex" style="margin-left:10px">
                    
                    <button type="submit" class="btn btn-success mt-3 ml-5 col-md-5 text-center">Update</button>
                    <a href="#" onclick="window.history.go(-1);" class="btn btn-primary col-md-5 ml-1 mt-3">Back</a>
                </div>
            </div>


           </form>

        </div>

</section>


@endsection
