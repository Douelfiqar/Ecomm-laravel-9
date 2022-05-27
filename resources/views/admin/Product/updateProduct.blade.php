@extends('admin.adminMaster')

@section('contentadmin')

<div class="">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Update Product</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Product</li>
                              <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content" >

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Update Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
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
                  <form method="POST" action="{{route('admin.editProduct')}}" enctype="multipart/form-data">
                    @csrf
{{-- first row --}}

                    <div class="row">
<input type="hidden" value="{{$product->id}}" name="idProduct">
                          <div class="col-4">
                              <div class="form-group">
                                  <h5>Brand Select <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="brand_id" id="optionBrand" class="form-control">
                                        @foreach ($Brands as $Brand)
                                        @if ($product['brands']['id'] ==  $Brand->id)
                                        {{-- $SubSubCategory['categories']['category_name_en'] --}}
                                        <option value="{{$Brand->id}}" selected>{{$Brand->brand_name_en}}</option>
                                        @else
                                        <option value="{{$Brand->id}}">{{$Brand->brand_name_en}}</option>
                                        @endif
                                        @endforeach
                                     </select>
                                  </div>
                              </div>
                              
                          </div>

                          <div class="col-4">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="category_id" id="optionCateg" class="form-control">
                                      @foreach ($Categories as $Category)
                                      @if ($product['categories']['id'] ==  $Category->id)
                                        {{-- $SubSubCategory['categories']['category_name_en'] --}}
                                        <option value="{{$Category->id}}" selected>{{$Category->category_name_en}}</option>
                                        @else
                                        <option value="{{$Category->id}}">{{$Category->category_name_en}}</option>
                                        @endif
                                      @endforeach
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="subcategory_id" id="optionSubCateg" class="form-control">
                                      <option disabled selected>Select a Sub Categ</option>
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                     </div>
{{-- second row --}}

                    <div class="row">
                        
                        <div class="col-4">
                            <div class="form-group">
                                <h5>Sub SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="subsubcategory_id" id="optionSubSubCateg" class="form-control">
                                    <option disabled selected>Select a Sub Categ</option>
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control" value="{{$product->product_name_en}}">
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>Product Name Fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_fr" class="form-control" value="{{$product->product_name_fr}}">
                                </div>
                            </div>
                        </div>

                    </div>

{{-- third row --}}

                    <div class="row">
                                            
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <h5>product_code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_qty<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="product_qty" class="form-control" value="{{$product->product_qty}}">
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_tags_en <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" data-role="tagsinput" name="product_tags_en" placeholder="add tags" value="{{$product->product_tags_en}}" /> 
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 4 row --}}

                    <div class="row">
                                            
                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_tags_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_fr" data-role="tagsinput" placeholder="add tags" value="{{$product->product_tags_fr}}" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_size_en <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_en" data-role="tagsinput" placeholder="add tags" value="{{$product->product_size_en}}" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_size_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_fr" data-role="tagsinput" placeholder="add tags" value="{{$product->product_size_fr}}" /> 
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 5 row --}}

                    <div class="row">
                                            
                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_color_en <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_en" data-role="tagsinput" placeholder="add tags" value="{{$product->product_color_en}}" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_color_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_fr" data-role="tagsinput" placeholder="add tags" value="{{$product->product_color_fr}}" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>selling_price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="selling_price" name="selling_price" class="form-control" value="{{$product->selling_price}}">
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 6 row --}}

                    <div class="row">
                                            
                        <div class="col-4">
                            <div class="form-group">
                                <h5>discount_price</h5>
                                <div class="controls">
                                    <input type="number" name="discount_price" class="form-control" value="{{$product->discount_price}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="width: 150px">
                            <div class="form-group">
                                <h5 class="col-form-label">Main Thambnail <span class="text-danger">*</span></label>
                                <div>
                                    <input type="file" class="form-control" name="product_thambnail">
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5 class="col-form-label">Multi Image <span class="text-danger">*</span></label>
                                <div>
                                    <input type="file" class="form-control" name="multi_img[]" multiple>
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 7 row --}}

                    <div class="row">
                                            
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Short Description En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="textarea" name="short_desc_en" class="form-control" value="{{$product->short_desc_en}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <h5 class="col-form-label">Short Description Fr <span class="text-danger">*</span></label>
                                <div>
                                    <input type="textarea" class="form-control" name="short_desc_fr" value="{{$product->short_desc_fr}}">
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 7-2 row --}}

                    <div class="row">
                                            
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Long Description En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="textarea" name="long_desc_en" class="form-control" value="{{$product->long_desc_en}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <h5 class="col-form-label">Long Description Fr <span class="text-danger">*</span></label>
                                <div>
                                    <input type="textarea" class="form-control" name="long_desc_fr" value="{{$product->long_desc_fr}}">
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 8 row --}}                

                    <div class="row">
                                            
                        <div class="col-3">
                            <div class="form-group">
                                <div class="controls">
                                    
                                      <div>
                                        <div class="form-check">
                                            
                                            @if ($product->hot_deals == 0)
                                            <input class="form-check-input" type="checkbox" name="hot_deals" id="flexCheckDefault">
                                            @else
                                            <input class="form-check-input" type="checkbox" name="hot_deals" id="flexCheckDefault" checked>
                                            @endif
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Hot Deals
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-3">
                                        <div class="form-check">
                                            @if ($product->featured == 0)
                                            <input class="form-check-input" type="checkbox" name="special_offer" id="flexCheckChecked">
                                            @else
                                            <input class="form-check-input" type="checkbox" name="special_offer" id="flexCheckChecked" checked>
                                            @endif
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Special Offer
                                            </label>
                                          </div>
                        </div>


                        <div class="col-3">
                            <div class="form-check">
                                            @if ($product->special_offer == 0)
                                            <input class="form-check-input" type="checkbox" name="featured" id="flexCheckIndeterminate">
                                            @else
                                            <input class="form-check-input" type="checkbox" name="featured" id="flexCheckIndeterminate" checked>
                                            @endif
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                  Featured
                                </label>
                              </div>
                        </div>

                        <div class="col-3">
                            <div class="form-check">
                                            @if ($product->special_deals == 0)
                                            <input class="form-check-input" type="checkbox" name="special_deals" id="defaultCheck1">
                                            @else
                                            <input class="form-check-input" type="checkbox" name="special_deals" id="defaultCheck1" checked>
                                            @endif
                                <label class="form-check-label" for="defaultCheck1">
                                  Special Deals
                                </label>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                                
                           

                        </div>
                    </div>
                      <div class="text-xs-right">
                          <button type="submit" class="btn btn-rounded btn-info">Update</button>
                      </div>

                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <div>
            <div class="box-header">						
                <h4 class="box-title">Product Table</h4>
            </div>  
            <div>
                <div class="box">
                    
                   
                        <div class="table-responsive" style="padding: 20px">
                            <div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="complex_header_length"><label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="complex_header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                                <thead>
                                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                                </thead>
                              
                                <tbody>
                                @foreach ($productMultiImages as $productMultiImage)
                                <tr>
                                    <td><img src="{{asset('upload/MultiProductPhoto/'.$productMultiImage->photo_name)}}" alt="" width="100px" height="100px" style="object-fit: contain"></td>
                                    <td>
                                        <div class="d-flex d-flex justify-content-center align-items-center">
        
                                            <a href="{{url('/admin/updateProduct/')}}" class="btn btn-success"><img src="https://img.icons8.com/fluency/48/000000/approve-and-update.png" width="55px"/></a>
        
                                            <a id="deleteee" href="{{url('/admin/deleteProduct/')}}" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/filled-trash.png" width="55px"/></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>      
        
                                
                            </table>
                         
        
                        </div>
                    </div>
                            
                        </div>
                        
                          
                <div>
                </div>
                </div>
        
        
                   </div>
           </div>
      </section>
      <!-- /.content -->
    </div>




</div>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    });
    
    
            $.ajax({
    
                        method: 'POST',
                        url: '{{url('/admin/product/SubCategoryajax')}}',
                        data: {text: $('#optionCateg').val()},
    
                success: function(result){
                    $('#optionSubSubCateg').html('');
                    $('#optionSubCateg').empty();
                    $.each(result.result, function(i, value) {
             $('#optionSubCateg').append($('<option>').text(value.SubCategory_name_en).attr('value', value.id));
              
                

                // second query

                $.ajax({

method: 'POST',
url: '{{url('/admin/product/SubSubCategoryajax')}}',
data: {text: $('#optionSubCateg').val()},

success: function(result){

$('#optionSubSubCateg').empty();
$.each(result.result, function(i, value) {
$('#optionSubSubCateg').append($('<option>').text(value.SubSubCategory_name_en).attr('value', value.id));

});
}
})
                // end second query

    });
                }
            })


    
        $('#optionCateg').click(function(){
    
            $.ajaxSetup({
                        headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                    });
    
    
            $.ajax({
    
                        method: 'POST',
                        url: '{{url('/admin/product/SubCategoryajax')}}',
                        data: {text: $('#optionCateg').val()},
    
                success: function(result){
                    $('#optionSubSubCateg').html('');
                    $('#optionSubCateg').empty();
                    $.each(result.result, function(i, value) {
             $('#optionSubCateg').append($('<option>').text(value.SubCategory_name_en).attr('value', value.id));
                
    });
                }
            })
            
        })
    })




    $(document).ready(function(){
    
    $('#optionSubCateg').click(function(){

        $.ajaxSetup({
                    headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                });


        $.ajax({

                    method: 'POST',
                    url: '{{url('/admin/product/SubSubCategoryajax')}}',
                    data: {text: $('#optionSubCateg').val()},

            success: function(result){

                $('#optionSubSubCateg').empty();
                $.each(result.result, function(i, value) {
         $('#optionSubSubCateg').append($('<option>').text(value.SubSubCategory_name_en).attr('value', value.id));
            
});
            }
        })
        
    })
})
    </script>
@endsection
