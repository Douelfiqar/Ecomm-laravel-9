@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    {{$product->product_name_en}}
@endsection
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="{{ asset('client/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
		<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
              @foreach ($HotDeals as $HotDeal)
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{asset('upload/productPhoto/'.$HotDeal->product_thambnail)}}" alt=""> </div>
                    <div class="sale-offer-tag"><span>DH {{$HotDeal->discount_price}}<br>
                      </span></div>
                    <div class="timing-wrapper">
                      <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                      </div>
                      <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="detail.html"><h3 class="name"><a href="detail.html">
						@if (session()->get('lang')=='francais')
						{{$HotDeal->product_name_fr}}
						@else
						{{$HotDeal->product_name_en}}
						@endif</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> @if ($HotDeal->discount_price)
						<span class="price-before-discount">{{$HotDeal->selling_price}} </span>
						<span class="price">DH {{$HotDeal->discount_price}} </span> 
						@else
						<span class="price">DH {{$HotDeal->selling_price}} </span> 
	
						@endif </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </div>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
              </div>
             {{-- end --}}                 
             @endforeach
            </div>
            <!-- /.sidebar-widget --> 
          </div>
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->

    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            @foreach ($imageCollections as $imageCollection)
            <div class="single-product-gallery-item" id="slide{{$imageCollection->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('upload/MultiProductPhoto/'.$imageCollection->photo_name)}}">          
                    <img class="img-responsive" alt="" src="{{asset('upload/MultiProductPhoto/'.$imageCollection->photo_name)}}" data-echo="{{asset('upload/MultiProductPhoto/'.$imageCollection->photo_name)}}" />
                </a>
            </div>
            @endforeach
            
            
            
           <!-- /.single-product-gallery-item -->

            

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                @foreach ($imageCollections as $imageCollection)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$imageCollection->id}}">
                        <img class="img-responsive" width="85" alt="" src="{{asset('upload/MultiProductPhoto/'.$imageCollection->photo_name)}}" data-echo="{{asset('upload/MultiProductPhoto/'.$imageCollection->photo_name)}}" />
                    </a>
                </div>
                @endforeach

                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"> 
							
								@if (session()->get('lang')=='francais')
                                {{$product->product_name_fr}}
                                 @else
                                   {{$product->product_name_en}}
                                @endif</h1>
								
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											@php
					$totalReview = App\Models\Review::where('product_id',$product->id)->count();
											@endphp
											<a href="#" class="lnk">({{$totalReview}} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability<i class="ti-folder"></i> :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
                                @if (session()->get('lang')=='francais')
                                {{$product->short_desc_fr}}
                                 @else
                                   {{$product->short_desc_en}}
                                @endif
                                                
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											@if($product->discount_price)
											<span class="price">
												DH {{$product->discount_price}}</span>
											<span class="price-strike">DH {{$product->selling_price}}  </span>
											@else
											<span class="price">
												DH {{$product->selling_price}} </span>
											@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>



									
								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								               
								                <input type="number" id="qty" name="qty" value="1" min="1" max="{{$product->product_qty}}">
												

							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
									<button id="{{$product->id}}" onclick="addToCartDetails(this.id)" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

																	</div><!-- /.row -->

							</div><!-- /.quantity-container -->

							{{-- ------------color and  size ------------------ --}}
								<div class="row">
									

									<div class="col-sm-6">
										@php
										$sizeEng = $product->product_size_en ;
										$arraySizeEn = explode(',',$sizeEng);

										$sizeFr = $product->product_size_fr ;
										$arraySizeFr = explode(',',$sizeFr);
										@endphp

											@if (session()->get('lang')=='francais')
											<select name="size" id="dsize">
												@foreach ($arraySizeFr as $size)
													<option value="{{$size}}">{{$size}}</option>
												@endforeach
											 </select>
											 @else
											 <select name="color" id="dsize">
												@foreach ($arraySizeEn as $size)
													<option value="{{$size}}">{{$size}}</option>
												@endforeach
											 </select>
											@endif
									</div>

									<div class="col-sm-6">
										@php
										$colorEng = $product->product_color_en ;
										$arrayColorEn = explode(',',$colorEng);

										$colorFr = $product->product_color_fr ;
										$arrayColorFr = explode(',',$colorFr);
										@endphp

											@if (session()->get('lang')=='francais')
											<select name="color" id="dcolor">
												@foreach ($arrayColorFr as $color)
													<option value="{{$color}}">{{$color}}</option>
												@endforeach
											 </select>
											 @else
											 <select name="color" id="dcolor">
												@foreach ($arrayColorEn as $color)
													<option value="{{$color}}">{{$color}}</option>
												@endforeach
											 </select>
											@endif
									
									</div>



									
								</div><!-- /.row -->

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
										
											@if (session()->get('lang')=='francais')
											{{$product->long_desc_fr}}
											 @else
											 {{$product->long_desc_en}}
											@endif
										</p>
									</div>	
								</div>
								<!-- /.tab-pane -->
								@if(Auth::check())

								<div id="review" class="tab-pane">
									<div class="product-tab">
	@csrf			
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
					
											<div id="reviewsAjax">

											</div>
											<!-- /.reviews -->
										</div><!-- /.product-reviews -->
										
<script>
	function getAllReviews(id){
		$.ajax({
    type:'get',
    url:'/client/getReviews/'+id,
    dataType:'json',
    success:function(data){
		console.log(data)
		var reviews = ""

		$.each(data.reviews,function(key,value){

			reviews += `<div class="reviews">
												<div class="review">
									
												<div class="card mb-3" style="max-width: 540px;">
							<div class="row g-0">
										<div class="col-md-4">
											
											<img src="{{asset('upload/clientPhoto/${value.picture_path}')}}" class="img-fluid rounded-start" alt="...">
											
										</div>
										
										<div class="col-md-8">
											<div class="card-body">
												<i class="ti-folder" style='color:red'></i>
												
												<h4 class="card-title"><strong>${value.user_name}</strong></h4>
												<h5 class="card-title">${value.summary}</h5>
												<p class="card-text">${value.comment}</p>
												<p class="card-text"><small class="text-muted">Last updated ${value.created_at} ago</small></p>
											</div>
											</div>
										</div>
							</div>

																		</div>
																	</div>`

		})

		$('#reviewsAjax').html(reviews)
	}
})
	}
	getAllReviews({{$product->id}})

	function addReview(id){
		Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})

		$.ajax({
			type:'get',
			url:'/client/addReview/'+id,
			dataType:'json',
			data:{comment:$('#comment').val(),summary:$('#summary').val()},
			success:function(data){
				$('#comment').reset()
				$('#summary').reset()
				
				getAllReviews({{$product->id}})
			}
	})
}
</script>
										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
														
														<div class="row">
															<div class="col-sm-6">
																<!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" name="summary" id="summary">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="comment" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button onclick="addReview({{$product->id}})" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
																			
@else
<a href="/login">Login</a>
@endif	
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->


								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt" value="{{$product->product_tags_en}}">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	@foreach ($productCategs as $productCateg)
			<div class="item item-carousel">
				<div class="products">
					
		<div class="product">		
			<div class="product-image">
				<div class="image">
					<a href="{{url('/client/home/details/'.$productCateg->id)}}"><img style="height:150px;object-fit:contain" src="{{asset('upload/productPhoto/'.$productCateg->product_thambnail)}}" alt=""></a>
				</div><!-- /.image -->			
	
							<div class="tag sale"><span>sale</span></div>            		   
			</div><!-- /.product-image -->
				
			
			<div class="product-info text-left">
				<h3 class="name"><a href="{{url('/client/home/details/'.$productCateg->id)}}">
					@if (session()->get('lang')=='francais')
					{{$productCateg->product_name_fr}}
					 @else
					 {{$productCateg->product_name_en}}
					@endif</a></h3>
				<div class="rating rateit-small"></div>
				<div class="description"></div>
	
				<div class="product-price">	
					@if($productCateg->discount_price)
					<span class="price">
						$ {{$productCateg->discount_price}}			</span>
												 <span class="price-before-discount">$ {{$productCateg->selling_price}}</span>
					@else
					<span class="price">
						$ {{$productCateg->selling_price}}			</span>
						@endif
										
				</div><!-- /.product-price -->
				
			</div><!-- /.product-info -->
						<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
							<li class="add-cart-button btn-group">
								<button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id)" id='{{$productCateg->id}}'> <i class="fa fa-shopping-cart"></i> </button>
								<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
														
							</li>
						   
							<li class="lnk wishlist">
								<a class="add-to-cart" href="detail.html" title="Wishlist">
									 <i class="icon fa fa-heart"></i>
								</a>
							</li>
	
							<li class="lnk">
								<a class="add-to-cart" href="detail.html" title="Compare">
									<i class="fa fa-signal"></i>
								</a>
							</li>
						</ul>
					</div><!-- /.action -->
				</div><!-- /.cart -->
				</div><!-- /.product -->
		  
				</div><!-- /.products -->
			</div>
			@endforeach
		<!-- /.item -->
	
		
		<!-- /.item -->
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->


<script>
										
	var qty = $('#qty').val()
	var size = $('#dsize').val()
	var color = $('#dcolor').val()

function addToCartDetails(id){
$.ajax({
type:'get',
url: '/client/addcart/detail/'+id,
dataType: 'json',
data:{color:color,size:size,qty:qty},
success:function(data){
miniCart()
}
})


}
</script>


@endsection
