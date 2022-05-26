@extends('admin.adminMaster')

@section('contentadmin')


<div class="row d-flex justify-content-center align-items-center">
    <div class="box-body col-7">
        <section>
            <div class="box-header d-flex justify-content-center align-items-center">
                <h4 class="box-title with-header">Add SubSub Category</h4>
            </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="box">
                    <div class="col-10">
                        <form action="{{route('admin.editSlider')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                            @csrf
                           
                            <input type="hidden" name="id" value="{{$slider->id}}">
    
                            <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon1">Title</span>
                             <input type="text" class="form-control" placeholder="Title" value="{{$slider->title}}" name="title" >
                           </div>
    
                           <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon1">Description</span>
                             <input type="textarea" class="form-control" placeholder="Desc" value="{{$slider->description}}" name="description">
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
               
        </section>   
         </div>
</div>

@endsection
