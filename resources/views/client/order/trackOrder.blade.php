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
     <th scope="col">Email</th>
     <th scope="col">Address</th>
     <th scope="col">Country</th>
     <th scope="col">City</th>
     <th scope="col">Phone Number</th>
     <th scope="col">Date to send</th>
     <th scope="col">Price Total</th>
     <th scope="col">Payement METHODE</th>
     <th scope="col">Status</th>

 </tr>
</thead>
<tbody>
@foreach($orders as $order)
 <tr>
 <td>{{Auth::user()->name}}</td>
 <td>{{$order->first_name}}</td>
 <td>{{$order->email}}</td>
 <td>{{$order->address}}</td>
 <td>{{$order->country}}</td>
 <td>{{$order->city}}</td>
 <td>{{$order->phone_number}}</td>
 <td>{{$order->date_send}}</td>
 <td>{{$order->priceTotal}}</td>
 <td>{{$order->payement_methode}}</td>
 @if($order->Status == 'Invalid')
 <td><button class="btn btn-danger" href="#" disabled>Invalid</button></td>
 @else
 <td><button class="btn btn-success" href="#" disabled>Valid</button></td>
 @endif


 </tr>
@endforeach
</tbody>
</table>
</div>			</div><!-- /.row -->
<a class="btn btn-info" href="{{route('client.profile')}}">Back</a>

		</div>
    


    </div><!-- /.container -->

</div>
@endsection
