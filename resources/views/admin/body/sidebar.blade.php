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
      
    <li class="{{$route == 'dashboard'? 'active':''}}">
      <a href="{{route('dashboard')}}">
        <i data-feather="pie-chart"></i>
        <span>Dashboard</span>
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
    
    <li class="treeview {{$route == 'admin.allProduct' ? 'active':''}}">
      <a href="#">
        <i data-feather="file"></i>
        <span>Products</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('admin.allProduct')}}"><i class="ti-more"></i>Product Index</a></li>
        {{-- <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
        <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
        <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
        <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li> --}}
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
