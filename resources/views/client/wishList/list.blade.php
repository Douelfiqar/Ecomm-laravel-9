@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
   Wish List
@endsection

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody id="troww">
				
			
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
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
<script>
    function getContent(){

		$.ajax({
		type:'get',
		url: '/client/getContentWish',
		dataType: 'json',
		success:function(data){

			var trow = ""

			$.each(data.data,function(key,value){

				trow += `
				<tr>
							<td class="col-md-2"><img src="{{asset('upload/productPhoto/${value.pic}')}}" alt="imga"></td>
							<td class="col-md-7">
								<div class="product-name"><a href="#">${value.nameProd}</a></div>
								<div class="price">
								`
							if(!value.discountPrice){
								trow += `	DH ${value.sellingPrice} `
							}else{
								trow += `DH	${value.discountPrice}
								<span>DH ${value.sellingPrice}</span> `

							}
								
				trow += `
						</div>
							</td>
							<td class="col-md-2">
								<button data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id,1)" style='border: none;
    background: none;
    cursor: pointer;
    margin: 0;
    padding: 0;' id='${value.product_id}'>
								<a href="#" class="btn-upper btn btn-primary">Add to cart</a>
							</button>
								</td>
							<td class="col-md-1 close-btn">
								<button id='${value.product_id}' style='border: none;
    background: none;
    cursor: pointer;
    margin: 0;
    padding: 0;' onclick='removeWish(this.id)'>
								<a href="#" class=""><i class="fa fa-times"></i></a>
								</button
							</td>
						</tr>
				`
			})
				$('#troww').append(trow)}
    })

    }

	
    getContent()

	function removeWish(id){
		
		$.ajax({
		type:'get',
		url: '/client/removeWish/'+id,
		dataType: 'json',
		success:function(data){
console.log(data)
// getContent()
$('#troww').empty();
getContent()
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your iteam has been removed successfully',
  showConfirmButton: false,
  timer: 1000
})
		}
		})
	}
</script>
@endsection
