@extends('admin.adminMaster')

@section('contentadmin')

<style>
    td{
        text-align: center;
    }
</style>

<div class="row">


    <div class="box-body col-11">
<section class="content p-5">
   <div>
    <div class="box-header">						
        <h4 class="box-title">Category Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="complex_header_length"><label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="complex_header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Category Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Category Name En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Category Name Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Category Slug En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Category Slug Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody>
                        @foreach ($categorys as $category)
                        <tr>
                            <td><img src="{{asset('upload/CategoryPhoto/'.$category->category_image)}}" alt="" srcset="" width="50px"></td>
                            <td>{{$category->category_name_en}}</td>
                            <td>{{$category->category_name_fr}}</td>
                            <td>{{$category->category_slug_en}}</td>
                            <td>{{$category->category_slug_fr}}</td>
                            <td>
                                <div class="d-flex d-flex justify-content-center align-items-center">

                                    <a href="{{url('/admin/updateCategory/'.$category->id)}}" class="btn btn-success"><img src="https://img.icons8.com/fluency/48/000000/approve-and-update.png" width="25px"/></a>

                                    <a id="deleteee" href="{{url('/admin/deleteCategory/'.$category->id)}}" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png" width="25px"/></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        

                        </tbody>      

                        
                    </table></div></div>
                    <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="complex_header_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="complex_header_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="complex_header_previous"><a href="#" aria-controls="complex_header" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="complex_header" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="complex_header" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="complex_header" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="complex_header" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="complex_header" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="complex_header" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="complex_header_next"><a href="#" aria-controls="complex_header" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
                    <form action="{{route('admin.addCategory')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Category Name Fr</span>
                         <input type="text" class="form-control" placeholder="Category Name French" aria-label="Username" aria-describedby="basic-addon1" name="CategoryNameFr">
                       </div>
                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Category Name En</span>
                         <input type="text" class="form-control" placeholder="Category Name English" aria-label="Username" aria-describedby="basic-addon1" name="CategoryNameEn">
                       </div>
                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Category Image</span>
                         <input type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="CategoryImage">
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

@endsection
