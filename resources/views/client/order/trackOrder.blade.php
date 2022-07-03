@extends('client.clientMaster')

@section('clientDynamique')

@section('title')
    Contact page
@endsection

<style>
    td,th{
        text-align: center
    }
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class='active'>Track your orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<!-- /.body-content -->


<div class="body-content" style="margin-top:50px">
	<div class="container">
		<div class="track-order-page">
			<div class="row">
				<div class="col-md-12">
	<h2 class="heading-title">Order details</h2>
    <table class="table">
 
 
 
        <thead>
 <tr>

     <th scope="col">Account_name</th>
     <th scope="col">First Name</th>
     <th scope="col">Address</th>
     <th scope="col">Country</th>
     <th scope="col">City</th>
     <th scope="col">Phone Number</th>
     <th scope="col">Price Total</th>
     <th scope="col">Payement METHODE</th>
     <th scope="col">Status</th>
     <th scope="col">Action</th>

 </tr>
</thead>
<tbody id="tableOrders">

</tbody>
</table>
</div>			</div><!-- /.row -->
<a class="btn btn-info" href="{{route('client.profile')}}">Back</a>

		</div>
    


    </div><!-- /.container -->

</div>

<script>
    function getOrders(){
        $.ajax({
        type:'get',
        url:'/client/getOrders',
        dataType:'json',
        success:function(data){
            console.log(data)
            var table = ""

            $.each(data.order.data,function(key,value){
                table += `
                 <tr>
 <td>{{Auth::user()->name}}</td>
 <td>${value.first_name}</td>
 <td>${value.address}</td>
 <td>${value.country}</td>
 <td>${value.city}</td>
 <td>${value.phone_number}</td>
 <td>${value.priceTotal}</td>
 <td>${value.payement_methode}</td>
 `
 if(value.Status == 'Invalid')
 table += `<td><button class="btn btn-danger" href="#" disabled>Invalid</button></td>`
 else{
   table += `<td><button class="btn btn-success" href="#" disabled>Valid</button></td>`
 }
 table += `
 <td><button id="cancel" onclick="cancelOrder(${value.id})" class="btn btn-warning">Cancel</button></td>

 </tr>`
            })

            $('#tableOrders').html(table)
        }
    })
    }

    getOrders()







    function cancelOrder(id){
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

    $.ajax({
        type:'get',
        url:'/client/cancelOrder/'+id,
        dataType:'json',
        success:function(data){
            getOrders()
        }
    })

    Swal.fire(
      'Deleted!',
      'Order has been deleted.',
      'success'
    )
    console.log(id)
  }
})
    }
</script>

@endsection


