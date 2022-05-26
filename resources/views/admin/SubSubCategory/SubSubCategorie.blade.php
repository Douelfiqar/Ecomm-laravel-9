@extends('admin.adminMaster')

@section('contentadmin')

<style>
    td{
        text-align: center;
    }
</style>

<div class="row">


    <div class="box-body col-12">
<section class="content p-5">
   <div>
    <div class="box-header">						
        <h4 class="box-title">Sub SubCategory Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="complex_header_length"><label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="complex_header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">SubSubCategory Name En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">SubSubCategory Name Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">SubSubCategory Slug En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">SubSubCategory Slug Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Category Name</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">SubCategory Name</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody>
                        @foreach ($SubSubCategorys as $SubSubCategory)
                        <tr>
                            <td>{{$SubSubCategory->SubSubCategory_name_en}}</td>
                            <td>{{$SubSubCategory->SubSubCategory_name_fr}}</td>
                            <td>{{$SubSubCategory->SubSubCategory_slug_en}}</td>
                            <td>{{$SubSubCategory->SubSubCategory_slug_fr}}</td>
                            <td>{{$SubSubCategory['categories']['category_name_en']}}</td>
                            <td>{{$SubSubCategory['subCategories']['SubCategory_name_en']}}</td>
                            <td>
                                <div class="d-flex d-flex justify-content-center align-items-center">

                                    <a href="{{url('/admin/updateSubSubCategory/'.$SubSubCategory->id)}}" class="btn btn-success"><img src="https://img.icons8.com/fluency/48/000000/approve-and-update.png" width="55px"/></a>

                                    <a id="deleteee" href="{{url('/admin/deleteSubSubCategory/'.$SubSubCategory->id)}}" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png" width="55px"/></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>      

                        
                    </table>
                    {{$SubSubCategorys->links();}}

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

<div class="row">
    <div class="box-body col-7">
        <section>
            <div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
            <div class="box-header">
                <h4 class="box-title with-header">Add Category</h4>
            </div>
            
                <div class="box">
                    <form action="{{route('admin.addSubSubCategory')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Category Name</span>
                            <select class="form-select col-8" name="categoryId" aria-label="Default select example" id="optionCateg">
                                <option selected disabled>Select Category</option>
                                @foreach($Categories as $Categorie)
                                <option value="{{$Categorie->id}}">{{$Categorie->category_name_en}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Sub Category Name</span>
                            <select class="form-select col-8" name="SubCategoryId" aria-label="Default select example" name="subsubcategory_id" id="subCategory">
                                <option selected disabled>Select Sub Category</option>
                            </select>
                        </div>

                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Sub SubCategory Name Fr</span>
                         <input type="text" class="form-control" placeholder="Sub Sub Category Name French" aria-label="Username" aria-describedby="basic-addon1" name="SubSubCategoryNameFr">
                       </div>

                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Sub SubCategory Name En</span>
                         <input type="text" class="form-control" placeholder="Sub SubCategory Name English" aria-label="Username" aria-describedby="basic-addon1" name="SubSubCategoryNameEn">
                       </div>

                      

                       <div class="input-group mb-3 row">
                           <div class="col-5"></div>
                       <button class="btn btn-success col-3">Add</button>
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
                    url: '{{url('/ajax')}}',
                    data: {text: $('#optionCateg').val()},

            success: function(result){
                $('#subCategory').empty();

                $.each(result.result, function(i, value){
                    $('#subCategory').append($('<option>').text(value.SubCategory_name_en).attr('value', value.id));
                });

            }
        })
        
    })
})
</script>
@endsection
