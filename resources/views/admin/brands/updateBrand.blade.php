@extends('admin.adminMaster')

@section('contentadmin')


<div class="row d-flex justify-content-center align-items-center">
    <div class="box-body col-7">
        <section>
            <div class="box-header d-flex justify-content-center align-items-center">
                <h4 class="box-title with-header">Add Brand</h4>
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
                    <form action="{{route('admin.editBrand')}}" method="get" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Brand Name Fr</span>
                         <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="brandNameFr" value="{{$brand->brand_name_fr}}">
                       </div>
                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Brand Name En</span>
                         <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="brandNameEn" value="{{$brand->brand_name_en}}">
                       </div>
                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Brand Image</span>
                         <input type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="brandImage">
                       </div>
                       <div class="input-group mb-3 row">
                           <div class="col-5"></div>
                       <button class="btn btn-success col-3">Update</button>
                       </div>
                    </form>
                </div>
        </section>   
         </div>
</div>


@endsection
