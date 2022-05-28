<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
       Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categories as $category)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$category->icon}}" aria-hidden="true"></i>
          @if (session()->get('lang')=='francais')
          {{$category->category_name_fr}}
          @else
          {{$category->category_name_en}}
          @endif</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                $SubCategories = App\Models\SubCategory::where('category_id',$category->id)->get();
                @endphp
                @foreach ($SubCategories as $SubCategory)
                <div class="col-sm-12 col-md-3">
                  <ul class="links list-unstyled">
                    <li><h2 class="title">@if (session()->get('lang')=='francais')
                      {{$SubCategory->SubCategory_name_fr}}
                      @else
                      {{$SubCategory->SubCategory_name_en}}
                      @endif</h2></li>
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
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
       @endforeach
          <!-- /.menu-item -->
        
       
          <!-- ================================== MEGAMENU VERTICAL ================================== -->
        
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
        <!-- /.menu-item -->
        
       
          <!-- /.dropdown-menu -->
        
     
          <!-- /.dropdown-menu -->
        <!-- /.menu-item -->
        
       
       
          <!-- /.dropdown-menu --> 
        <!-- /.menu-item -->
        
      
        
          <!-- /.dropdown-menu -->
        <!-- /.menu-item -->
        
     
          <!-- /.dropdown-menu --> 
        <!-- /.menu-item -->
        
       
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
        <!-- /.menu-item -->
        
       
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
