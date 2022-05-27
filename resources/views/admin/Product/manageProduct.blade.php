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
        <h4 class="box-title">Product Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="complex_header_length"><label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="complex_header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Product Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Product Qty</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Status</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><img src="{{asset('upload/ProductPhoto/'.$product->product_thambnail)}}" alt="{{$product->product_name_en}}" width="100px" height="100px" style="object-fit: contain"></td>
                            <td>{{$product->product_name_en}}</td>
                            <td>{{$product->product_name_fr}}</td>
                            <td>{{$product->product_qty}}</td>
                            <td> @if ($product->status == '1')
                                <a href="{{url('/admin/statusProduct/'.$product->id)}}" class="btn btn-success">Active</a>
                            @else
                            <a href="{{url('/admin/statusProduct/'.$product->id)}}"  class="btn btn-danger">Inactive</a>
                            @endif</td>
                            <td>
                                <div class="d-flex d-flex justify-content-center align-items-center">

                                    <a href="{{url('/admin/updateProduct/'.$product->id)}}" class="btn btn-success"><img src="https://img.icons8.com/fluency/48/000000/approve-and-update.png" width="55px"/></a>

                                    <a id="deleteee" href="{{url('/admin/deleteProduct/'.$product->id)}}" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png" width="55px"/></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>      

                        
                    </table>
                    {{$products->links();}}

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


@endsection
