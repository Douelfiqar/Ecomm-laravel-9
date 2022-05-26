@extends('admin.adminMaster')

@section('contentadmin')

<style>
    td{
        text-align: center;
    }
    th{
        text-align: center;
    }
</style>

<div class="row">


    <div class="box-body col-12">
<section class="content p-5">
   <div>
    <div class="box-header">						
        <h4 class="box-title">Slider Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div class="row">
                        <div class="col-8">
                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Slider Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Title</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Desc</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Status</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody>
                        @foreach ($Sliders as $Slider)
                        <tr>
                            <td><img src="{{asset('/upload/slider/'.$Slider->slider_img)}}" alt="$Slider->title"></td>
                            <td>{{$Slider->title}}</td>
                            <td>{{$Slider->description}}</td>
                            <td> @if ($Slider->status == 1)
                                <a href="{{url('/admin/statusSlider/'.$Slider->id)}}" class="btn btn-success">Active</a>
                            @else
                            <a href="{{url('/admin/statusSlider/'.$Slider->id)}}"  class="btn btn-danger">Inactive</a>
                            @endif</td>
                            <td>
                                <div class="d-flex d-flex justify-content-center align-items-center">

                                    <a href="{{url('/admin/updateSlider/'.$Slider->id)}}" class="btn btn-success"><img src="https://img.icons8.com/fluency/48/000000/approve-and-update.png" width="55px"/></a>

                                    <a id="deleteee" href="{{url('/admin/deleteSlider/'.$Slider->id)}}" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png" width="55px"/></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>      

                        
                    </table>
                    {{$Sliders->links();}}

                </div>

                <div class="col-4">
                    <form action="{{route('admin.addSlider')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Title</span>
                         <input type="text" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" name="title">
                       </div>

                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Description</span>
                         <input type="text" class="form-control" placeholder="Desc" aria-label="Username" aria-describedby="basic-addon1" name="description">
                       </div>

                       <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Image Slider</span>
                        <input type="file" class="form-control" name="slider_img">
                      </div>
                       

                       <div class="input-group mb-3 row">
                           <div class="col-5"></div>
                       <button class="btn btn-success col-3">Add</button>
                       </div>
                    </form>
                </div>
            </div>
                    
                </div>
                
                  
        <div>
        </div>
        </div>


           </div>
   </div>
    
</section>


</div>


</div>


        </section>   
         </div>
</div>

@endsection
