<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('client/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('client/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('client/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
    @include('client.body.header')
<!-- ============================================== HEADER : END ============================================== -->
@yield('clientDynamique')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('client.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('client/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('client/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('client/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('client/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('client/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('client/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('client/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('client/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('client/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('client/assets/js/scripts.js')}}"></script>



{{--------------------------- add model------------------- --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-primary" onclick="addToCart()">ADD TO CART</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  
  function viewProduct(id){

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
             $('#psize').append($('<option>').text(value).attr('value',value));
    });
    }else{
      $('#sizeR').hide();
    }

    $('#ptitle').text(data.product.product_name_en);
    $('#pprice').text(data.price);
    $('#sstock').text(data.product.product_qty);
    $('#ccategory').text(data.category_name);
    $('#bbrand').text(data.brand_name);
    $('#pqty').attr('max',data.product.product_qty)
    $('#pimg').attr('src','/upload/productPhoto/'+data.product.product_thambnail)

    $('#pcolor').empty();
    $.each(data.colorARRAY, function(i, value) {
             $('#pcolor').append($('<option>').text(value).attr('value',value));
    });


         }
});
  
}


function addToCart(){

  var product_name = $('#ptitle').text();
  var product_id = $('#pprod_id').val();
  var color = $('#pcolor option:selected').text();
  var size = $('#psize option:selected').text();
  var qty = $('#pqty').val();


  $.ajax({
    type:'post',
    dataType: 'json',
    data:{
      product_name:product_name,product_id:product_id,color:color,size:size,qty:qty
    },
    url: "/client/cart/data/store/"+product_id,
    success:function(data){
      console.log(data)
      miniCart()
      console.log(data)
      $('#close-btn-model').click();
    }
  })

}
</script>

<script  type="text/javascript">

  function miniCart(){

    
    $.ajax({
      type:'GET',
      url: '/client/product/mini/cart',
      dataType:'json',
      success:function(response){

        var miniCart = "";

        $.each(response.carts, function(key,value){
          miniCart += `<div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="image"> <a href="detail.html"><img src="/upload/productPhoto/${value.options.image}" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                        <div class="price">$ ${value.price} * ${value.qty}</div>
                      </div>
                      <div class="col-xs-1 action"> <button id="${value.rowId}" onclick="removeMiniCart(this.id)"> <i class="fa fa-trash"></i> </button> </div>
                    </div>
                  </div>
                  
                    <div class="clearfix"></div>
                  <hr>` 
         });


         $('#totalMiniCart1').text(response.cartTotal);
         $('#totalMiniCart2').text(response.cartTotal + ' $');
         $('#countMiniCart').text(response.cartQty)

        $('#miniCart').html(miniCart)
      }
    })
  }

  miniCart()


  function removeMiniCart(rowId){
      console.log('first')
    $.ajax({
      type:'GET',
      url: '/client/product/remove/mini/cart/'+rowId,
      dataType:'json',
      success:function(response){
        miniCart();
      }

    })
  }


</script> 


<script type="text/javascript">

function getCart(){

  $.ajax({

type:'get',
url:'/client/getCart',
dataType:'json',
success:function(data){
  var trow = ""
  
  $.each(data.response, function(key,value){
      var total = value.price*value.qty ;
    trow += `
    <tr>
    
    <td class="romove-item"><button title="cancel" class="icon" id="${value.rowId}" onclick="removeIteam(this.id)"><i class="fa fa-trash-o"></i></button></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="/upload/productPhoto/${value.options.image}" style='height:90px;object-fit:contain' alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html">${value.name}</a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							
						</div><!-- /.row -->
						<div class="cart-product-info">
											<span class="product-color">COLOR:<span>${value.options.color}</span></span>
						</div>
					</td>
					<td class="cart-product-edit"><a href="#" class="product-edit">
            
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal1" onClick="viewProductCartPage(this.id)" id='${value.id}'> <i class="fa-solid fa-pen"></i></button>

            </a></td>
					<td class="cart-product-quantity">
						<div class="quant-input">
            <input type="hidden" name="itemId" value="${value.id}">
				                
				                <input type="number" value="${value.qty}" id='qty' min='1' max='$stock'>
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">${value.price} $</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">${total} $</span></td>
          <td>
          <input type="hidden" id="hrowId" value="${value.rowId}" >
           <button class="btn btn-upper btn-primary pull-right outer-right-xs"
            onclick="updateQuantiter(document.getElementById('hrowId').value)">
            Update Iteam</button>
            </td>
          </tr>
          `
  })



  $('#subTotal').html(data.total + '$')

  $('#trow').html(trow);

}
})
}

getCart()

function removeIteam(rowId){

    $.ajax({

        type:'get',
        url:'/client/removeCart/'+rowId,
        dataType:'json',
        success:function(data){
          getCart()
        }
    })
}

function updateQuantiter(rowId,qty){
  
  var qty = document.getElementById('qty').value;
  $.ajax({
    type:'get',
    url: '/client/updateQuantiter/'+rowId+'/'+qty,
    dataType: 'json',
    success:function(data){
      getCart()      
    }
  })
}

function getTotal(){
  
  $.ajax({
    type:'get',
    url: '/client/getTotal',
    dataType: 'json',
    success:function(data){
      $('#subTotal').text(data.response+'  $')
    }
  })
}

getTotal()
</script>


<script type="text/javascript">

  function getIteamsShippingPage(){
    $.ajax({
		type:'get',
		url:'/client/checkout/getAllIteams',
		dataType:'json',
		success:function(data){
			var myPara = ""
				$.each(data.carts,function(key,value){
						myPara += `<div class="row" style='display: flex;    flex-direction: column; justify-content: center; align-items: center;'>
									<img src="/upload/productPhoto/${value.options.image}" alt="" style='width:50px;height:75px;  object-fit: contain; '>
									<h4>${value.name}</h4>
									<p>Price: ${value.price} DH * (${value.qty}) Quantiter </p>
									<hr>
									</div>`
				})
        var shippingTotal = `
        <hr>
        <div class='row' >
         <div class='col-md-4'>
          </div>
          <div>
           Total: ${data.total} DH
            </div>
          </div>`
				$('#totalShipping').html(shippingTotal)
				$('#iteams').html(myPara);
			}
	})
  }

  getIteamsShippingPage()
</script>





</body>
</html>
