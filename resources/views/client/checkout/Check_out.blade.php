@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    Checkout Page
@endsection

    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->


<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Checkout Method
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">

				<!-- guest-login -->
				<div class="col-md-6 col-sm-6 guest-login">
                <form class="register-form" role="form" method='POST' action='{{route('client.shipping')}}'>
					@csrf
					    <div class="radio radio-checkout-unicase">
                            <table>
                                <tr>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">First name: <span>*</span></label>
					    <input type="name" class="form-control unicase-form-control text-input" name="first_name" id="exampleInputEmail1" placeholder="">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Last name: <span>*</span></label>
					    <input type="name" class="form-control unicase-form-control text-input" name="last_name" id="exampleInputPassword1" placeholder="">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Email: <span>*</span></label>
					    <input type="sdvsvsdvs@gmail.com" class="form-control unicase-form-control text-input" id="" name="email" placeholder="">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Address: <span>*</span></label>
					    <input type="address" class="form-control unicase-form-control text-input" id="exampleInputPassword1" name="address" placeholder="">
					  </div>

                                    </td>
                                </tr>
                            </table>



                              <br>

					    </div>
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">

						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Country: <span>*</span></label>
                        <select class="form-select" aria-label="Default select example" name="country" id='contry' required>
  <option selected disabled>Open this select menu</option>
				@foreach($countries as $country)
				<option value="{{$country->id}}">{{$country->name}}</option>
				@endforeach
</select>




    		  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">City: <span>*</span></label>
                        <select class="form-select" aria-label="Default select example" name="city" id='cityId'>
							<option selected disable>Open this select menu</option>
						</select>
	  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Code postale: <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" name="code_postal" id="exampleInputPassword1" placeholder="">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Phone number: <span>*</span></label>
					    <input type="number" class="form-control unicase-form-control text-input" name="phone_number" id="exampleInputPassword1" placeholder="">
					  </div>
					  <button type="submit" class='btn btn-primary'>Checkout</button>

				</div	>
				<!-- already-registered-login -->

			</div>
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
</form>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->



					  	<!-- checkout-step-06  -->

					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
			<div id='iteams'>
				div
			</div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li><a href="#">Billing Address</a></li>
					<li><a href="#">Shipping Address</a></li>
					<li><a href="#">Shipping Method</a></li>
					<li><a href="#">Payment Method</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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


<script type="text/javascript">

  function getIteamsShippingPage(){

    $.ajax({
		type:'get',
		url:'/client/checkout/getIteams',
		dataType:'json',
		success:function(data){
				console.log(data)
		}
	})
  }

  getIteamsShippingPage()
</script>


<script>
document.getElementById("contry").addEventListener('change',function(){
	var idCountry = document.getElementById('contry').value;
	$.ajax({
      type:'get',
      url:'/client/getCities/'+idCountry,
      dataType:'json',
      success:function(data){
		var myCities = ""
		$('#cityId').empty();
				$.each(data.cities,function(key,value){
						$('#cityId').append($('<option>').text(value.name).attr('value',value.id));
				})
				// console.log(myCities)

				//  $('#contry').html(myCities);
      }
    });

});
</script>
@endsection

