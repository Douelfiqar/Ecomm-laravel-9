@extends('admin.adminMaster')

@section('contentadmin')

<div class="">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Add Product</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Product</li>
                              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
            <h4 class="box-title">Add Product</h4>
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
                  <form method="POST" action="{{route('admin.addProduct')}}" enctype="multipart/form-data">
                    @csrf
{{-- first row --}}

                    <div class="row">

                          <div class="col-4">
                              <div class="form-group">
                                  <h5>Brand Select <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="brand_id" id="optionBrand" class="form-control">
                                        @foreach ($Brands as $Brand)
                                        <option value="{{$Brand->id}}">{{$Brand->brand_name_en}}</option>
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
                                      <option value="{{$Category->id}}">{{$Category->category_name_en}}</option>
                                      @endforeach
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <select name="subcategory_id" id="optionSubCateg" class="form-control" required>
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
                                  <select name="subsubcategory_id" id="optionSubSubCateg" class="form-control" required>
                                    <option disabled selected>Select a Sub Categ</option>
                                   </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control" required>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>Product Name Fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_fr" class="form-control" required>
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
                                        <input type="text" name="product_code" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_qty<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="product_qty" class="form-control" required>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_tags_en <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="Lorem,Ipsum,Amet" data-role="tagsinput" name="product_tags_en" placeholder="add tags" /> 
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
                                    <input type="text" value="Lorem,Ipsum,Amet" name="product_tags_fr" data-role="tagsinput" placeholder="add tags" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_size_en <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="Small,Midium,Large" name="product_size_en" data-role="tagsinput" placeholder="add tags" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_size_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="Small,Midium,Large" name="product_size_fr" data-role="tagsinput" placeholder="add tags" /> 
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
                                    <input type="text" value="Red,Black,White" name="product_color_en" data-role="tagsinput" placeholder="add tags" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>product_color_fr <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="Rouge,Noire,Blanc" name="product_color_fr" data-role="tagsinput" placeholder="add tags" /> 
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5>selling_price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="selling_price" name="selling_price" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>

{{-- 6 row --}}

                    <div class="row">
                                            
                        <div class="col-4">
                            <div class="form-group">
                                <h5>discount_price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="discount_price" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="width: 150px">
                            <div class="form-group">
                                <h5 class="col-form-label">Main Thambnail <span class="text-danger">*</span></label>
                                <div>
                                    <input type="file" class="form-control" name="product_thambnail" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <h5 class="col-form-label">Multi Image <span class="text-danger">*</span></label>
                                <div>
                                    <input type="file" class="form-control" name="multi_img[]" multiple required>
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
                                    <input type="textarea" name="short_desc_en" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <h5 class="col-form-label">Short Description Fr <span class="text-danger">*</span></label>
                                <div>
                                    <input type="textarea" class="form-control" name="short_desc_fr" required>
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
                                    <input type="textarea" name="long_desc_en" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <h5 class="col-form-label">Long Description Fr <span class="text-danger">*</span></label>
                                <div>
                                    <input type="textarea" class="form-control" name="long_desc_fr" required>
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
                                            <input class="form-check-input" type="checkbox" name="hot_deals" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" name="special_offer" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Special Offer
                                            </label>
                                          </div>
                        </div>


                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                  Featured
                                </label>
                              </div>
                        </div>

                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="special_deals" id="defaultCheck1">
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
                          <button type="submit" class="btn btn-rounded btn-info">Submit</button>
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

      </section>
      <!-- /.content -->
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
