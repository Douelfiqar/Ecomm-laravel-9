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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="row">

                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('upload/productPhoto/'.$product->product_thambnail)}}" class="card-img-top" alt="..." style="height:200px;width:200px;object-fit: contain;" >
                      </div>
                </div>


                <div class="col-md-4">
                      <ul class="list-group">
                        <li class="list-group-item">Product Price: </li>
                        <li class="list-group-item">Product Code:</li>
                        <li class="list-group-item">Stock</li>
                        <li class="list-group-item">Category</li>
                        <li class="list-group-item">Brand</li>
                      </ul>
                </div>


                <div class="col-md-4">
                    <div class="form-group">

                        <label for="exampleFormControlSelect1">Select Color</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Size</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Qty</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" min="1">
                      </div>


                </div>

            </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">ADD TO CART</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
