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
                    <form action="{{route('admin.editSubSubCategory')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$SubSubCategory->id}}">
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Category Id</span>
                            <select class="form-select col-8" name="categoryId" id="optionCateg" aria-label="Default select example">
                                @foreach($Categories as $Categorie)
                                @if ($SubSubCategory->category_id == $Categorie->id)
                                <option value="{{$Categorie->id}}" selected>{{$Categorie->category_name_en}}</option>
                                @else
                                <option value="{{$Categorie->id}}">{{$Categorie->category_name_en}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Sub Category Name</span>
                            <select class="form-select col-8" name="SubCategoryId" aria-label="Default select example" id="subCategory">
                                <option selected disabled>Select Sub Category</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">category Name En</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="SubSubCategoryNameEn" value="{{$SubSubCategory->SubSubCategory_name_en}}">
                        </div>

                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">category Name Fr</span>
                         <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="SubSubCategoryNameFr" value="{{$SubSubCategory->SubSubCategory_name_fr}}">
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


<script>
    $(document).ready(function(){
    
        $('#optionCateg').change(function(){
    
            $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    });
    
    
            $.ajax({
    
                        method: 'POST',
                        url: '{{url('/admin/ajax')}}',
                        data: {text: $('#optionCateg').val()},
    
                success: function(result){
                    if(typeof(result) != 'undefined'){
                        $('#subCategory').empty();
                        $('#subCategory').append($('<option selected disabled>').text('Select Sub Category'));
                        $.each(result, function(i, value) {
             $('#subCategory').append($('<option>').text(value.SubCategory_name_en).attr('value', value.id));
                
    });
                        
                    }
                    
                },
                error: function(error)
                           {
                    alert("Error AJAX not working: "+ error );
                              } 
            })
            
        })
    })
    </script>
@endsection
