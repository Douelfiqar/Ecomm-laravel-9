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
                            <li role="presentation"><a href="#">position</a></li>
                            <li role="presentation"><a href="#">Price:Lowest first</a></li>
                            <li role="presentation"><a href="#">Price:HIghest first</a></li>
                            <li role="presentation"><a href="#">Product Name:A to Z</a></li>
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
        <!-- /.row --> 
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
          <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
              <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item-->
              
              <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
              <!--/.item--> 
            </div>
            <!-- /.owl-carousel #logo-slider --> 
          </div>
          <!-- /.logo-slider-inner --> 
          
        </div>
        <!-- /.logo-slider --> 
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.body-content --> 
    
    </body>


<script>
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
      })
      .fail(function(){
        alert('Something Went Wrong');
      })



    }
   
    

    var page = 1;
    $(window).scroll(function (){
      if ($(window).scrollTop() + $(window).height() >= $(document).height()){

        page ++;
        loadmoreProduct(page);
      }
    });



</script>


@endsection


