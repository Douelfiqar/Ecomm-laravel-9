<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="{{route('client.profile')}}"><i class="icon fa fa-user"></i>My Account</a></li>
              <li><a href="{{url('/client/wishList')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="{{url('client/display/shopping-cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="{{url('client/checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
            
              @if(Auth::check())
              <li><form method="POST" action="{{route('logout')}}">
                @csrf
                <a onclick="this.closest('form').submit();return false;" style="cursor: pointer"><i class="icon fa fa-lock"></i>Logout</a>
              </form></li>
              @else
              <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
              @endif
              @if($admin == true)
                <li><a href="{{url('admin/dashboard')}}">Dashboard</a> </li>
              @endif
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
             

              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
              @if (session()->get('lang')=='francais')

                Langue
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/client/home/lang/en')}}">Anglais</a></li>
                </ul>
              @else
                  
              Language
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/client/home/lang/fr')}}">Frensh</a></li>
                </ul>
              @endif  
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{url('client/home')}}"> <img src="{{asset('client/assets/images/logo.png')}}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form method="get" action="{{url('/client/searchList/2')}}">
                <div class="control-group">
                 
                  
                  <input class="search-field" placeholder="Search here..." id="search" name="listOfproduct" onfocus="search_result_show()" onblur="search_result_hide()" />

                  <button class="search-button" type="submit"></button> </div>
              
                </form>

              <div id="searchProducts">

              </div>
              
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="countMiniCart"></span></div>
                <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="value" id="totalMiniCart1"></span> <span class="sign">DH </span></span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <!-- ----ajax--- -->

  <div id="miniCart">
    
  </div>


                  <!-- end ajax -->
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id="totalMiniCart2">DH</span> </div>
                    <div class="clearfix"></div>
                    <a href="{{url('client/checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{route('home')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>

                      @foreach ($categories as $category)
                          
                  <li class="dropdown yamm mega-menu"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if (session()->get('lang')=='francais')
                    {{$category->category_name_fr}}
                    @else
                    {{$category->category_name_en}}
                    @endif
                    </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                        @php
                            $SubCategories = App\Models\SubCategory::where('category_id',$category->id)->get();
                        @endphp
                           
                             @foreach ($SubCategories as $SubCategory)                                
                             <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">
                                @if (session()->get('lang')=='francais')
                                {{$SubCategory->SubCategory_name_fr}}
                                @else
                                {{$SubCategory->SubCategory_name_en}}
                                @endif
                                </h2>
                              <ul class="links">
                                @php
                                  $SubSubs = App\Models\SubSubCategory::where('sub_category_id',$SubCategory->id)->get();
                                @endphp
                                @foreach ($SubSubs as $SubSub)
                                <li><a href="{{url('client/category/'.$SubSub->id)}}">
                                  @if (session()->get('lang')=='francais')
                                  {{$SubSub->SubSubCategory_name_fr}}
                                  @else
                                   {{$SubSub->SubSubCategory_name_en}}     
                                  @endif
                                  </a></li>
                                @endforeach
                              </ul>
                            </div>

                            @endforeach

                            <!-- /.col -->
                            
                           
                            <!-- /.col -->
                            
                            
                            <!-- /.col -->
                            
                            
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach

                  {{-- <li class="dropdown hidden-sm"> <a href="category.html">Health & Beauty <span class="menu-label new-menu hidden-xs">new</span> </a> </li> --}}
                 
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                </ul>

                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>

  <style>
  
.search-area{
  position: relative;
}
  #searchProducts {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #ffffff;
    z-index: 999;
    border-radius: 8px;
    margin-top: 5px;
  }
</style>
<script>
  function search_result_hide(){
    $("#searchProducts").slideUp();
  }
  
   function search_result_show(){
      $("#searchProducts").slideDown();
  }
</script>
