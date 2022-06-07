@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    Home Easy Online Shopping
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>

    <div class="breadcrumb">
      <div class="container">
        <div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Handbags</li>
          </ul>
        </div>
        <!-- /.breadcrumb-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
      <div class='container'>
        <div class='row'>
          <div class='col-md-3 sidebar'> 
            <!-- ================================== TOP NAVIGATION ================================== -->
            @include('client.body.sidebarClient')
            <!-- /.side-menu --> 
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <div class="sidebar-module-container">
              <div class="sidebar-filter"> 
                <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                  <h3 class="section-title">shop by</h3>
                  <div class="widget-header">
                    <h4 class="widget-title">Sub Category</h4>
                  </div>
                  @foreach ($subCategories as $subCategory)
                  <div class="sidebar-widget-body">
                    <div class="accordion">
                      <div class="accordion-group">
                        <div class="accordion-heading"> <a href="#collapse{{$subCategory->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> {{$subCategory->SubCategory_name_en}} </a> </div>
                        <!-- /.accordion-heading -->
                        @php
                            $SubSubCategories = App\Models\SubSubCategory::where('sub_category_id',$subCategory->id)->get();        
                        @endphp
                        <div class="accordion-body collapse" id="collapse{{$subCategory->id}}" style="height: 0px;">
                          <div class="accordion-inner">
                            <ul>
                                @foreach ($SubSubCategories as $SubSubCategory)
                                <li><a href="{{url('client/category/'.$SubSubCategory->id)}}">{{$SubSubCategory->SubSubCategory_name_en}}</a></li>
                                @endforeach
                             
                            </ul>
                          </div>
                          <!-- /.accordion-inner --> 
                        </div>
                        <!-- /.accordion-body --> 
                      </div>
                      <!-- /.accordion-group -->
                      
                     
                      <!-- /.accordion-group --> 
                      
                    </div>
                    <!-- /.accordion --> 
                  </div>    
                  @endforeach
                  
                  <!-- /.sidebar-widget-body --> 
                </div>
                <!-- /.sidebar-widget --> 
                <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
                
                <!-- ============================================== PRICE SILDER============================================== -->
                <div class="sidebar-widget wow fadeInUp">
                  <div class="widget-header">
                    <h4 class="widget-title">Price Slider</h4>
                  </div>
                  <div class="sidebar-widget-body m-t-10">
                    <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                      <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                      <input type="text" class="price-slider" value="" >
                    </div>
                    <!-- /.price-range-holder --> 
                    <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                  <!-- /.sidebar-widget-body --> 
                </div>
                <!-- /.sidebar-widget --> 
                <!-- ============================================== PRICE SILDER : END ============================================== --> 
                <!-- ============================================== MANUFACTURES============================================== -->
              
                <!-- /.sidebar-widget --> 
                <!-- ============================================== MANUFACTURES: END ============================================== --> 
                <!-- ============================================== COLOR============================================== -->
               
                <!-- /.sidebar-widget --> 
                <!-- ============================================== COLOR: END ============================================== --> 
                <!-- ============================================== COMPARE============================================== -->
               
                <!-- /.sidebar-widget --> 
                <!-- ============================================== COMPARE: END ============================================== --> 
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @php
              $productTagsEn = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
              $productTagsFr = App\Models\Product::groupBy('product_tags_fr')->select('product_tags_fr')->get();
          @endphp
          <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="tag-list">
                @if (session()->get('lang')=='francais')
                @foreach ($productTagsFr as $productTagsF)
                <a class="item" title="Phone" href="category.html">{{$productTagsF->product_tags_fr}}</a> 
                @endforeach
                @else
                @foreach ($productTagsEn as $productTagsE)
                <a class="item" title="Phone" href="category.html">{{$productTagsE->product_tags_en}}</a> 
                @endforeach
                @endif
                   
                  </div>
              <!-- /.tag-list --> 
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
                <!-- /.sidebar-widget --> 
              <!----------- Testimonials------------->
               
                
                <!-- ============================================== Testimonials: END ============================================== -->
                
                
              </div>
              <!-- /.sidebar-filter --> 
            </div>
            <!-- /.sidebar-module-container --> 
          </div>
          <!-- /.sidebar -->
          <div class='col-md-9'> 
            <!-- ========================================== SECTION – HERO ========================================= -->
            
            
         
            <div class="clearfix filters-container m-t-10">
              <div class="row">
                <div class="col col-sm-6 col-md-2">
                  <div class="filter-tabs">
                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                      <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                      <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                    </ul>
                  </div>
                  <!-- /.filter-tabs --> 
                </div>
                <!-- /.col -->
                <div class="col col-sm-12 col-md-6">
                  <div class="col col-sm-3 col-md-6 no-padding">
                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                      <div class="fld inline">
                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                          <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                          <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><button id="low" onclick="order(this.id)">Price:Lowest first</button</li>
                            <li role="presentation"><button id="hight" onclick="order(this.id)">Price:Highest first</button></li>
                            <li role="presentation"><button id="byName" onclick="order(this.id)">Product Name: A to Z</button></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.fld --> 
                    </div>
                    <!-- /.lbl-cnt --> 
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-3 col-md-6 no-padding">
                    
                    <!-- /.lbl-cnt --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.col -->
                
              
              </div>
              <!-- /.row --> 
            </div>
            <div class="search-result-container ">
              <div id="myTabContent" class="tab-content category-list">
                <div class="tab-pane active " id="grid-container">
                  <div class="category-product">
                    <div class="row" id="list_view_product">

                        @include('client.category.list_view_product')
                      
                      <!-- /.item -->
                      
                  
                      <!-- /.item --> 
                    </div>
                    <!-- /.row --> 
                  </div>
                  <!-- /.category-product --> 
                  
                </div>
                <!-- /.tab-pane -->
                
                <div class="tab-pane "  id="list-container">
                  <div class="category-product" id="grid_view_product">


                  @include('client.category.list_view_grid_product')
                   
                    <!-- /.category-product-inner -->
                    
                   
                    <!-- /.category-product-inner --> 
                    
                  </div>
                  <!-- /.category-product --> 
                </div>
                <!-- /.tab-pane #list-container --> 
              </div>
              <!-- /.tab-content -->
              <!-- /.filters-container --> 
              
            </div>
            <!-- /.search-result-container --> 
            
          </div>
          <!-- /.col --> 

          <div class="ajax-loadmore-product text-center" style="display:none;">
                <img src="{{asset('/client/Spinner-1s-200px.svg')}}" alt="" style="width: 120px;height:120px">
          </div>

        </div>
        <input type="hidden" id="subsub" value="{{$subsubCategorties}}">
        <!-- /.row --> 
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        <!-- /.logo-slider --> 
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.body-content --> 
    
    </body>


<script>
    var tst = 1100

     function loadmoreProduct(page){
      $.ajax({
        type: "get",
        url: "?page="+page,
        beforeSend: function(response){
          $('.ajax-loadmore-product').show();
        }
      })
      .done(function(data){
        if (data.grid_view == " " || data.list_view == " ") {
          return;
        }
         $('.ajax-loadmore-product').hide();
         $('#grid_view_product').append(data.grid_view);
         $('#list_view_product').append(data.list_view);
         if(data.grid_view == '')
          tst = 20000   
      })
      .fail(function(){
        alert('Something Went Wrong');
      })



    }
   
    

    var page = 1;
    $(window).scroll(function (){
      
      if ($(window).scrollTop() + $(window).height() >= tst ){
        page ++;
        loadmoreProduct(page);
      }
    });





    function order(id){
      
      var subsub = $('#subsub').val();

      $.ajax({
        type:'get',
        url:'/client/orderBy/'+id+'/'+subsub,
        dataType:'json',
        success:function(data){

          $('#list_view_product').empty();
          $('#grid_view_product').empty();
          tst = 1100

          var list = ""
          var grid = ""
          $.each(data.ProductFiltreds.data, function(key,value){
            list += `
            <div class="col-sm-6 col-md-4 wow fadeInUp">
                            <div class="products">
                              <div class="product">
                                <div class="product-image">
                                  <div class="image"> <a href="/client/home/details/${value.id}"><img  src="{{asset('upload/productPhoto/${value.product_thambnail}')}}" alt=""></a> </div>
                                  <!-- /.image -->
                                  
                                  <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->
                                
                                <div class="product-info text-left">
                                  <h3 class="name"><a href="/client/home/details/${value.id}">
                                    ${value.product_name_en}
                                  </a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="description"></div>
                                  <div class="product-price">
                                  
                                    <span class="price">${value.selling_price} DH </span> 
                                   </div>
                                  <!-- /.product-price --> 
                                  
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                  <div class="action">
                                    <ul class="list-unstyled">
                                      <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                      </li>
                                      <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                      <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                    </ul>
                                  </div>
                                  <!-- /.action --> 
                                </div>
                                <!-- /.cart --> 
                              </div>
                              <!-- /.product --> 
                              
                            </div>
                            <!-- /.products --> 
                          </div>
            `

            grid += `
             <div class="category-product-inner wow fadeInUp">
                        <div class="products">
                          <div class="product-list product">
                            <div class="row product-list-row">
                              <div class="col col-sm-4 col-lg-4">
                                <div class="product-image">
                                  <div class="image"><a href="/client/home/details/${value.id}"'> <img src="{{asset('upload/productPhoto/${value.product_thambnail}')}}" alt=""> </a></div>
                                </div>
                                <!-- /.product-image --> 
                              </div>
                              <!-- /.col -->
                              <div class="col col-sm-8 col-lg-8">
                                <div class="product-info">
                                  <h3 class="name"><a href="/client/home/details/${value.id}'">
                                   
                                    ${value.product_name_en}
                                    </a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="product-price"> 
                                    
                                    <span class="price">${value.selling_price} DH </span> 
                
                                    </div>
                                  <!-- /.product-price -->
                                  <div class="description m-t-10">      
                                    ${value.short_desc_en}
                                  </div>
                                  <div class="cart clearfix animate-effect">
                                    <div class="action">
                                      <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                      </ul>
                                    </div>
                                    <!-- /.action --> 
                                  </div>
                                  <!-- /.cart --> 
                                  
                                </div>
                                <!-- /.product-info --> 
                              </div>
                              <!-- /.col --> 
                            </div>
                            <!-- /.product-list-row -->
                            <div class="tag new"><span>new</span></div>
                          </div>
                          <!-- /.product-list --> 
                        </div>
                        <!-- /.products --> 
                      </div>     
            `

          })


          
          $('#list_view_product').html(list)
          $('#grid_view_product').html(grid)

        }
      })
    }

</script>


@endsection


