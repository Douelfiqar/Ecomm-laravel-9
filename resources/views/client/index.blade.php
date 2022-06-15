@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    Home Easy Online Shopping
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          
        
                    <!-- ================================== TOP NAVIGATION ================================== -->
          @include('client.body.sidebarClient')
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== --> 
          
          <!-- ============================================== HOT DEALS ============================================== -->
          @include('client.body.hotDeals')
          <!-- ============================================== HOT DEALS: END ============================================== --> 
          
          <!-- ============================================== SPECIAL OFFER ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    @foreach ($SpecialOffers as $SpecialOffer)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('/client/home/details/'.$SpecialOffer->id)}}"> <img src="{{asset('upload/productPhoto/'.$SpecialOffer->product_thambnail)}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{url('/client/home/details/'.$SpecialOffer->id)}}">{{$SpecialOffer->product_name_en}}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> DH {{$SpecialOffer->discount_price}} </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>    
                    @endforeach
                    
                    
                  </div>
                </div>
               
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
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
          <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
          <!-- ============================================== SPECIAL DEALS ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Deals</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    @foreach ($SpecialDeals as $SpecialDeal)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{asset('upload/productPhoto/'.$SpecialDeal->product_thambnail)}}"  alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">
                                @if (session()->get('lang')=='francais')
                                {{$SpecialDeal->product_color_fr}}
                                @else
                                {{$SpecialDeal->product_color_en}}
                                @endif
                              </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> @if ($SpecialDeal->discount_price)
                                <span class="price-before-discount">{{$SpecialDeal->selling_price}} </span>
                                <span class="price">DH{{$SpecialDeal->discount_price}} </span> 
                                @else
                                <span class="price">DH{{$SpecialDeal->selling_price}} </span> 
    
                                @endif </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                    
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
          <!-- ============================================== NEWSLETTER ============================================== -->
          {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <p>Sign Up for Our Newsletter!</p>
              <form>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
              </form>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== NEWSLETTER: END ============================================== --> 
          
          <!-- ============================================== Testimonials============================================== -->
          {{-- <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div> --}}
          
          <!-- ============================================== Testimonials: END ============================================== -->
          
          <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
        </div>
        <!-- /.sidemenu-holder --> 
        <!-- ============================================== SIDEBAR : END ============================================== --> 
        
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
          <div id="hero">

            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

              @foreach ($slides as $slider)
              <div class="item" style="background-image: url({{asset('upload/slider/'.$slider->slider_img)}});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">Top Brands</div>
                    <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->description}}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div>
                  <!-- /.caption --> 
                </div>
                <!-- /.container-fluid --> 
              </div>
              @endforeach
              
              <!-- /.item -->
              
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          
          <!-- ========================================= SECTION – HERO : END ========================================= --> 
          
          <!-- ============================================== INFO BOXES ============================================== -->
          <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
              <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">free shipping</h4>
                      </div>
                    </div>
                    <h6 class="text">Shipping on orders over DH 99</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Sale</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra 5 DH off on all items </h6>
                  </div>
                </div>
                <!-- .col --> 
              </div>
              <!-- /.row --> 
            </div>
            <!-- /.info-boxes-inner --> 
            
          </div>
          <!-- /.info-boxes --> 
          <!-- ============================================== INFO BOXES : END ============================================== --> 
          <!-- ============================================== SCROLL TABS ============================================== -->
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">New Products</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                @foreach ($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                  @if (session()->get('lang')=='francais')
                  {{$category->category_name_fr}}
                  @else
                  {{$category->category_name_en}}
                  @endif</a></a></li>
                @endforeach
                
                
              </ul>
              <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">

              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
                  @foreach ($products as $product)
                  <input type="hidden" id="prod_id" value="{{$product->id}}">
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{url('/client/home/details/'.$product->id)}}"><img style='height:150px;object-fit:contain' src="{{asset('upload/productPhoto/'.$product->product_thambnail)}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/client/home/details/'.$product->id)}}">{{$product->product_name_en}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> @if ($product->discount_price)
                            <span class="price-before-discount">{{$product->selling_price}} </span>
                            <span class="price">DH {{$product->discount_price}} </span> 
                            @else
                            <span class="price">DH {{$product->selling_price}} </span> 

                            @endif </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id,1)" id='{{$product->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                
                              </li>
                              <li class="add-cart-button "> <button data-toggle="tooltip" class="btn btn-primary icon" id='{{$product->id}}' onclick="addToWish(this.id)" title="Wishlist"> <i class="icon fa fa-heart"></i> </button> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                  @endforeach
                    
              
                    <!-- /.item --> 
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->

              @foreach ($categories as $category)
              <div class="tab-pane" id="category{{$category->id}}">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  @php
                      $Prod = App\Models\Product::where('category_id', $category->id)->where('status',1)->get();
                  @endphp
                  @foreach ($Prod as $P)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{url('/client/home/details/'.$P->id)}}"><img  src="{{asset('upload/productPhoto/'.$P->product_thambnail)}}" style='height:150px;object-fit:contain' alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{asset('upload/productPhoto/'.$P->product_thambnail)}}">{{$P->product_name_en}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price">

                            @if ($P->discount_price)
                            <span class="price-before-discount">{{$P->selling_price}} </span>
                            <span class="price">DH{{$P->discount_price}} </span> 
                            @else
                            <span class="price">DH{{$P->selling_price}} </span> 

                            @endif
                            
                            {{-- {{$P->selling_price}} --}}
                            {{-- {{$P->discount_price}} --}}
                             </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id)" id='{{$P->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
                  @endforeach
                    
              
                    <!-- /.item --> 
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              @endforeach
              <!-- /.tab-pane -->
              
            
              <!-- /.tab-pane -->
              
             
              <!-- /.tab-pane --> 
              
            </div>
            <!-- /.tab-content --> 
          </div>
          <!-- /.scroll-tabs --> 
          <!-- ============================================== SCROLL TABS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col -->
              <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.wide-banners --> 
          
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
           
           @foreach ($Featureds as $Featured)
           <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{url('/client/home/details/'.$Featured->id)}}" ><img style='height:150px;object-fit:contain'  src="{{asset('/upload/productPhoto/'.$Featured->product_thambnail)}}" alt=""></a> </div>
                  <!-- /.image -->
                  
                  <div class="tag hot"><span>hot</span></div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{url('/client/home/details/'.$Featured->id)}}">  
                    @if (session()->get('lang')=='francais')
                    {{$Featured->product_name_fr}}
                    @else
                    {{$Featured->product_name_en}}
                    @endif</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> @if ($Featured->discount_price)
                    <span class="price-before-discount">{{$Featured->selling_price}} </span>
                    <span class="price">DH{{$Featured->discount_price}} </span> 
                    @else
                    <span class="price">DH{{$Featured->selling_price}} </span> 

                    @endif </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id)" id='{{$Featured->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
           @endforeach
              
              <!-- /.item -->
              
             
              <!-- /.item --> 
            </div>
            <!-- /.home-owl-carousel --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" style='height:150px;object-fit:contain' src="assets/images/banners/home-banner.jpg" alt=""> </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">New Mens Fashion<br>
                        <span class="shopping-needs">Save up to 40% off</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                  <!-- /.new-label --> 
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
              
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.wide-banners --> 
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== BEST SELLER ============================================== -->
          




          {{-- ====================================== Category ============================== --}}

          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Electronique Products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
           
           @foreach ($Electroniques as $Electronique)
           <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{url('/client/home/details/'.$Electronique->id)}}"><img style='height:150px;object-fit:contain'e  src="{{asset('/upload/productPhoto/'.$Electronique->product_thambnail)}}" alt=""></a> </div>
                  <!-- /.image -->
                  
                  <div class="tag hot"><span>hot</span></div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{url('/client/home/details/'.$Electronique->id)}}">
                    
                    @if (session()->get('lang')=='francais')
                    {{$Electronique->product_name_fr}}
                    @else
                    {{$Electronique->product_name_en}}
                    @endif
                  </a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> @if ($Electronique->discount_price)
                    <span class="price-before-discount">{{$Electronique->selling_price}} </span>
                    <span class="price">DH{{$Electronique->discount_price}} </span> 
                    @else
                    <span class="price">DH{{$Electronique->selling_price}} </span> 

                    @endif </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id)" id='{{$Electronique->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
           @endforeach
              
              <!-- /.item -->
              
             
              <!-- /.item --> 
            </div>
            <!-- /.home-owl-carousel --> 
          </section>


          {{-- ================================== END CATEGORY ================================= --}}
          <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">


                <div class="item">
                  <div class="products best-product">
                    @foreach($bestSeller1 as $bestSeller)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('/client/home/details/'.$bestSeller->id)}}"> <img  style="object-fit:contain;height:
                                80px" src="{{asset('/upload/productPhoto/'.$bestSeller->product_thambnail)}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{url('/client/home/details/'.$bestSeller->id)}}">  @if (session()->get('lang')=='francais')
                                {{$bestSeller->product_name_fr}}
                                @else
                                {{$bestSeller->product_name_en}}
                                @endif/a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> @if ($bestSeller->discount_price)
                                <span class="price-before-discount">{{$bestSeller->selling_price}} </span>
                                <span class="price">DH{{$bestSeller->discount_price}} </span> 
                                @else
                                <span class="price">DH{{$bestSeller->selling_price}} </span> 
            
                                @endif  </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                  </div>
                </div>


                <div class="item">
                  <div class="products best-product">
                    @foreach($bestSeller2 as $bestSeller)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('/client/home/details/'.$bestSeller->id)}}"> <img style="object-fit:contain;height:
                                80px" src="{{asset('/upload/productPhoto/'.$bestSeller->product_thambnail)}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{url('/client/home/details/'.$bestSeller->id)}}">  @if (session()->get('lang')=='francais')
                                {{$bestSeller->product_name_fr}}
                                @else
                                {{$bestSeller->product_name_en}}
                                @endif/a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> @if ($bestSeller->discount_price)
                                <span class="price-before-discount">{{$bestSeller->selling_price}} </span>
                                <span class="price">DH{{$bestSeller->discount_price}} </span> 
                                @else
                                <span class="price">DH{{$bestSeller->selling_price}} </span> 
            
                                @endif  </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                  </div>
                </div>


                <div class="item">
                  <div class="products best-product">
                    @foreach($bestSeller3 as $bestSeller)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('/client/home/details/'.$bestSeller->id)}}"> <img style="object-fit:contain;height:
                                80px" src="{{asset('/upload/productPhoto/'.$bestSeller->product_thambnail)}}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{url('/client/home/details/'.$bestSeller->id)}}">  @if (session()->get('lang')=='francais')
                                {{$bestSeller->product_name_fr}}
                                @else
                                {{$bestSeller->product_name_en}}
                                @endif/a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> @if ($bestSeller->discount_price)
                                <span class="price-before-discount">{{$bestSeller->selling_price}} </span>
                                <span class="price">DH{{$bestSeller->discount_price}} </span> 
                                @else
                                <span class="price">DH{{$bestSeller->selling_price}} </span> 
            
                                @endif  </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                  </div>
                </div>


                <div class="item">
                  <div class="products best-product">
                    @foreach($bestSeller4 as $bestSeller)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="{{url('/client/home/details/'.$bestSeller->id)}}"> <img src="{{asset('/upload/productPhoto/'.$bestSeller->product_thambnail)}}" style="object-fit:contain;height:
                              80px" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="{{url('/client/home/details/'.$bestSeller->id)}}">  @if (session()->get('lang')=='francais')
                                {{$bestSeller->product_name_fr}}
                                @else
                                {{$bestSeller->product_name_en}}
                                @endif</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> @if ($bestSeller->discount_price)
                                <span class="price-before-discount">{{$bestSeller->selling_price}} </span>
                                <span class="price">DH{{$bestSeller->discount_price}} </span> 
                                @else
                                <span class="price">DH{{$bestSeller->selling_price}} </span> 
            
                                @endif  </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    @endforeach
                  </div>
                </div>

                
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== BEST SELLER : END ============================================== --> 
          
          <!-- ============================================== BLOG SLIDER ============================================== -->
          <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
              <div class="owl-carousel blog-slider custom-carousel">
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                      <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item --> 
                
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                      <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                      <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                      <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            <!-- /.blog-slider-container --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== BLOG SLIDER : END ============================================== --> 
          
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        
        
              @foreach ($beauties as $beauty)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{url('/client/home/details/'.$beauty->id)}}"><img  src="{{asset('/upload/productPhoto/'.$beauty->product_thambnail)}}" style='height:150px;object-fit:contain' alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="{{url('/client/home/details/'.$beauty->id)}}">  @if (session()->get('lang')=='francais')
                        {{$beauty->product_name_fr}}
                        @else
                        {{$beauty->product_name_en}}
                        @endif</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> @if ($beauty->discount_price)
                        <span class="price-before-discount">{{$beauty->selling_price}} </span>
                        <span class="price">DH{{$beauty->discount_price}} </span> 
                        @else
                        <span class="price">DH{{$beauty->selling_price}} </span> 
    
                        @endif   </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id)" id='{{$beauty->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                          <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
              @endforeach
              
              <!-- /.item -->
              
           
              <!-- /.item --> 
            </div>
            <!-- /.home-owl-carousel --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
     @include('client.body.brand')
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
    </div>
    <!-- /.container --> 
  </div>
@endsection
