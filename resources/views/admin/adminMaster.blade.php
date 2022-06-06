<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

    <title>Sunny Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href=" {{ asset('admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
@include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    @include('admin.body.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		@yield('contentadmin')
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
@include('admin.body.footer')

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	 
	<!-- Vendor JS -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>

<script type="text/javascript">
    $(function(){
      $(document).on('click','#deleteee',function(e){
        
        e.preventDefault();

        Swal.fire('Any fool can use a computer');

        var link = $(this).attr("href");

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})


      })
      
    })

    

    
  </script>


	<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
	
  <script src="{{asset('admin/js/vendors.min.js')}}"></script>
  <script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
	<script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
	<script src="{{asset('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
	<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.js')}}"></script>
	<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
	<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
	<script src="{{asset('assets/vendor_components/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{asset('assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>
	<script src="{{asset('admin/js/pages/advanced-form-element.js')}}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{asset('admin/js/template.js')}}"></script>



  
</body>
</html>
<!-- Vendor JS -->

