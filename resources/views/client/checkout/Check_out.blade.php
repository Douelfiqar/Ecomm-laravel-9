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
                <form class="register-form" role="form" method='POST' action='{{route('client.orderInformation')}}'>
					@csrf
					    <div class="radio radio-checkout-unicase">
                            <table>
                                <tr>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">First name:	 <span>*</span></label>
					    <input type="name" class="form-control unicase-form-control text-input" name="first_name" id="exampleInputEmail1" placeholder="">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Last name:<span>*</span></label>
					    <input type="name" class="form-control unicase-form-control text-input" name="last_name" id="exampleInputPassword1" placeholder="">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Email:<span>*</span></label>
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

					  <div class="row">
						<div class="col-sm-6">
							<label for="">Card</label>
							<input type="radio" name="Payement" value="Card" id="Card" onclick="display()" checked>
						</div>

						<div class="col-sm-6">
							<label for="">Cash on Delivery</label>			
							<input type="radio" name="Payement" value="Cash" onclick="hide()">
			
 						</div>
					  </div>
					  <br>
<div id="cardData" >
					  <div class="row">
						  <div class="col-sm-12">
								<label for="">Card number</label>
								<input 	class="form-control unicase-form-control text-input" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
						  </div>
						 
					  </div>
						<div class="row">
								<div class="col-sm-12">
								<label for="Expirate date">Expirate date</label>
								</div>
						</div>

					<div class="row" style="margin-left: -25px;">
						  
						 
							<style>
								.exp-wrapper {
									position: relative;
									border: 1px solid #aaa;
									display: flex;
									width: 300px;
									justify-content: space-around;
									height: 36px;
									line-height: 36px;
									font-size: 24px;
									}

								.exp-wrapper:after {
								content: '/';
								position: absolute;
								left: 50%;
								margin-left: -4px;
								color: #aaa;
								}

								input.exp {
								float: left;
								font-family: monospace;
								border: 0;
								width: 18px;
								outline: none;
								appearance: none;
								font-size: 14px;
								}
							</style>
							

							<div class="exp-wrapper col-sm-12" style="margin-left: 28px;">
							<input autocomplete="off" class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="MM" type="text" data-pattern-validate />
							<input autocomplete="off" class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical" placeholder="YY" type="text" data-pattern-validate />
							</div>
							<br>
							<script>
										const monthInput = document.querySelector('#month');
									const yearInput = document.querySelector('#year');

									const focusSibling = function(target, direction, callback) {
									const nextTarget = target[direction];
									nextTarget && nextTarget.focus();
									// if callback is supplied we return the sibling target which has focus
									callback && callback(nextTarget);
									}

									// input event only fires if there is space in the input for entry. 
									// If an input of x length has x characters, keyboard press will not fire this input event.
									monthInput.addEventListener('input', (event) => {

									const value = event.target.value.toString();
									// adds 0 to month user input like 9 -> 09
									if (value.length === 1 && value > 1) {
										event.target.value = "0" + value;
									}
									// bounds
									if (value === "00") {
										event.target.value = "01";
									} else if (value > 12) {
										event.target.value = "12";
									}
									// if we have a filled input we jump to the year input
									2 <= event.target.value.length && focusSibling(event.target, "nextElementSibling");
									event.stopImmediatePropagation();
									});

									yearInput.addEventListener('keydown', (event) => {
									// if the year is empty jump to the month input
									if (event.key === "Backspace" && event.target.selectionStart === 0) {
										focusSibling(event.target, "previousElementSibling");
										event.stopImmediatePropagation();
									}
									});

									const inputMatchesPattern = function(e) {
									const { 
										value, 
										selectionStart, 
										selectionEnd, 
										pattern 
									} = e.target;
									
									const character = String.fromCharCode(e.which);
									const proposedEntry = value.slice(0, selectionStart) + character + value.slice(selectionEnd);
									const match = proposedEntry.match(pattern);
									
									return e.metaKey || // cmd/ctrl
										e.which <= 0 || // arrow keys
										e.which == 8 || // delete key
										match && match["0"] === match.input; // pattern regex isMatch - workaround for passing [0-9]* into RegExp
									};

									document.querySelectorAll('input[data-pattern-validate]').forEach(el => el.addEventListener('keypress', e => {
									if (!inputMatchesPattern(e)) {
										return e.preventDefault();
									}
									}));
							</script>
								
 
					</div>

					  <div class="row" style="margin-left: -15px;">
						  <div class="col-sm-12">
								<label for="">Card number</label>
								<input 	class="form-control unicase-form-control text-input" type="tel" inputmode="numeric" autocomplete="cc-number" maxlength="3" placeholder="123">
						  </div>
					  </div>

						  </div>	
					  <button type="submit" class='btn btn-primary'>Checkout</button>
				</div>
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
      }
    });

});
</script>


<script>
	var card = document.getElementById('Card');

	// card.addEventListener('click',function(){
	// 	document.getElementById('cardData').style.display = 'none';	
	// })
	function hide(){
		document.getElementById('cardData').style.display = 'none';
	}
	function display(){
		document.getElementById('cardData').style.display = 'block';
	}
</script>

@endsection

