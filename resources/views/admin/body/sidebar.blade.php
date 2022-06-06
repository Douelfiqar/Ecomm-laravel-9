@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();   
@endphp


<section class="sidebar">	
		
    <div class="user-profile">
        <div class="ulogo">
             <a href="{{route('dashboard')}}">
              <!-- logo for regular state and mobile devices -->
                 <div class="d-flex align-items-center justify-content-center">	
                     				 	
                      <img src="{{ asset('admin/images/logo-dark.png') }}" alt="">
                      <h3><b>Sunny</b> Admin</h3>
                 </div>
            </a>
        </div>
    </div>
  
  <!-- sidebar menu-->
  <ul class="sidebar-menu" data-widget="tree">  
      
    <li class="{{$route == 'dashboard' ? 'active':''}}">
      <a href="{{route('dashboard')}}">
      <i class="ti-pie-chart"></i>
              <span>Dashboard</span>
      </a>
    </li>  
    
    <li class="{{$route == 'home' ? 'active':''}}">
      <a href="{{route('home')}}">
      <i class="ti-home"></i>
                              <span>Home</span>
                              <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
    </li>  

    <li class="treeview {{$route == 'admin.allBrands'? 'active':''}}">
      <a href="#">
        <i data-feather="message-circle"></i>
        <span>Brands</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.allBrands')}}"><i class="ti-more"></i>Brands</a></li>
      </ul>
    </li>
      
    <li class="treeview {{$route == 'admin.allCategory' ? 'active':''}}">
      <a href="#">
        <i data-feather="mail"></i> <span>Category</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.allCategory')}}"><i class="ti-more"></i>Category</a></li>
        <li><a href="{{route('admin.allSubCategory')}}"><i class="ti-more"></i>Sub Category</a></li>
        <li><a href="{{route('admin.allSubSubCategory')}}"><i class="ti-more"></i>Sub SubCategory</a></li>

      </ul>
    </li>
    
    <li class="treeview C">
      <a href="#">
        <i data-feather="file"></i>
        <span>Products</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.manageProduct')}}"><i class="ti-more"></i>Manage Product</a></li>
        <li><a href="{{route('admin.addProduct')}}"><i class="ti-more"></i>Add Product</a></li>
      </ul>
    </li> 		      
 
    <li class="treeview {{$route == 'admin.allSlider' ? 'active':''}} {{$route == 'admin.addSlider' ? 'active':''}}">
      <a href="#">
        <i class="ti-folder"></i>
        <span>Slider</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.allSlider')}}"><i class="ti-more"></i>All Slider</a></li>

        <li><a href="{{route('admin.addSlider')}}"><i class="ti-more"></i>Add Slider</a></li>
      </ul>
    </li>

    <li class="treeview {{$route == 'admin.allOrder' ? 'active':''}} {{$route == 'admin.gestionOrder' ? 'active':''}}">
      <a href="#">
      <i class="ti-write"></i>
        <span>Shipping</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
       
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.allOrder')}}"><i class="ti-more"></i>All Order</a></li>
      </ul>
    </li>

   

    <li class="treeview {{$route == 'admin.manageUser' ? 'active':''}}">
      <a href="#">
      <i class="ti-user"></i>
        <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
       
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.manageUser')}}"><i class="ti-more"></i>Manage Users</a></li>
      </ul>
    </li>

    <li class="treeview {{$route == 'admin.manageReview' ? 'active':''}}">
      <a href="#">
      <i class="ti-filter"></i>
        <span>Reviews</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
       
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.manageReview')}}"><i class="ti-more"></i>Manage Reviews</a></li>
      </ul>
    </li>
  </ul>
</section>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>
