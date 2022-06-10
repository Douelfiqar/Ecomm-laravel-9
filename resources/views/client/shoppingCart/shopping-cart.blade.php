@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    shopping-cart
@endsection
	
    <body class="cnt-home">


<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-edit item">Edit</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Grandtotal</th>
                    <th class="cart-total last-item">Update</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{route('home')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody id="trow">
                
               
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->		
		<!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md" id="subTotal"></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{url('client/checkout')}}"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			






</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
    </body>
	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel"><span id="ptitle"></span></h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			  
				<div class="row">
	
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<img src="" class="card-img-top" alt="..." id="pimg" style="height:200px;width:200px;object-fit: contain;" >
						  </div>
					</div>
	
	
					<div class="col-md-4">
						  <ul class="list-group">
							<li class="list-group-item">Product Price: <strong id="pprice" style="color:red"></strong> </li>
						   
							<li class="list-group-item">Stock: <strong id="sstock" style="color:red"></strong></li>
							<li class="list-group-item">Category: <strong id="ccategory" style="color:red"></strong></li>
							<li class="list-group-item">Brand: <strong id="bbrand" style="color:red"></strong></li>
						  </ul>
					</div>
	
	
					<div class="col-md-4">
						<div class="form-group">
	
							<label for="exampleFormControlSelect1">Select Color</label>
							<select class="form-control" id="pcolor">
							 
							</select>
						  </div>
	
						
						  <div class="form-group" id="sizeR">
							<label for="exampleFormControlSelect1">Select Size</label>
							<select class="form-control" id="psize">
							  
							</select>
						  </div>
	
						  <div class="form-group">
							<label for="exampleFormControlInput1">Qty</label>
							<input type="number" class="form-control" id="pqty" min="1" value="1">
						  </div>
	
	
					</div>
	
				</div>
	
	
	
	
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" id="close-btn-model" data-dismiss="modal">Close</button>
			  <input type="hidden" id="pprod_id" >
			  <button type="button" class="btn btn-primary" onclick="updateCart()">UPDATE CART</button>
			</div>
		  </div>
		</div>
	  </div>

<script>
function viewProductCartPage(id){
	
$.ajax({
  type: 'GET',
  url: '/client/product/view/modal/'+id,
  dataType: 'json', 
  success:function(data){

    $('#pprod_id').attr('value',id);
    $('#psize').empty();

    if(data.sizeARRAY.length > 1){
      $('#sizeR').show();
    $.each(data.sizeARRAY, function(i, value) {
		if(data.cart.options.size == value)
             $('#psize').append($('<option selected>').text(value).attr('value',value));
				else{
					$('#psize').append($('<option>').text(value).attr('value',value));

				}
    });
    }else{
      $('#sizeR').hide();
    }

    $('#ptitle').text(data.product.product_name_en);
    $('#pprice').text(data.price);
    $('#sstock').text(data.product.product_qty);
    $('#ccategory').text(data.category_name);
    $('#bbrand').text(data.brand_name);
    $('#pqty').attr('max',data.product.product_qty).attr('value',data.cart.qty)
    $('#pimg').attr('src','/upload/productPhoto/'+data.product.product_thambnail)

    $('#pcolor').empty();
    $.each(data.colorARRAY, function(i, value) {
		if(data.cart.options.color == value)
             $('#pcolor').append($('<option selected>').text(value).attr('value',value));
				else{
					$('#pcolor').append($('<option>').text(value).attr('value',value));
				}
    });


         }
});
}


function updateCart(){

	var product_name = $('#ptitle').text();
  var product_id = $('#pprod_id').val();
  var color = $('#pcolor option:selected').text();
  var size = $('#psize option:selected').text();
  var qty = $('#pqty').val();

  $.ajax({
    type:'get',
    dataType: 'json',
    data:{
      product_name:product_name,product_id:product_id,color:color,size:size,qty:qty
    },
    url: "/client/cart/data/update/"+product_id,
    success:function(data){
      console.log(data)
	  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your update has been saved',
  showConfirmButton: false,
  timer: 1500
})
      miniCart()
	  getCart()
      $('#close-btn-model').click();
    }
  })

}

</script>
@endsection
