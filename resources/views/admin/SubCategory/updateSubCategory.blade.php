@extends('admin.adminMaster')

@section('contentadmin')


<div class="row d-flex justify-content-center align-items-center">
    <div class="box-body col-7">
        <section>
            <div class="box-header d-flex justify-content-center align-items-center">
                <h4 class="box-title with-header">Add Sub Category</h4>
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
                    <form action="{{route('admin.editSubCategory')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$SubCategory->id}}">
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Category Id</span>
                            <select class="form-select col-8" name="categoryId" aria-label="Default select example" required>
                                @foreach($Categories as $Categorie)
                                @if ($SubCategory->category_id == $Categorie->id)
                                <option value="{{$Categorie->id}}" selected>{{$Categorie->category_name_en}}</option>
                                @else
                                <option value="{{$Categorie->id}}">{{$Categorie->category_name_en}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">category Name En</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="SubCategoryNameEn" value="{{$SubCategory->SubCategory_name_en}}" required>
                          </div>

                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">category Name Fr</span>
                         <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="SubCategoryNameFr" value="{{$SubCategory->SubCategory_name_fr}}" required>
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
