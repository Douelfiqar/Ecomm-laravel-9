@extends('admin.adminMaster')

@section('contentadmin')
<style>
    td{
        text-align: center;
    }
    th{
        text-align: center;
    }
</style>
<div class="box-body col-12">
    <div class="box-body">
    <section class="content p-5">
<div>

    <div class="box-header">						
        <h4 class="box-title">Shipping Table</h4>
    </div>  


    <div>
        <div class="row">
        <div class="col-8">
            <div class="box">
           
           <table class="table">
 
 
 
           <thead>
    <tr>

        <th scope="col">User Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Country</th>
        <th scope="col">City</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order)
    <tr>
        <td>{{$order->users()->first()->name}}</td>     
        <td>{{$order->first_name}}</td>      
        <td>{{$order->email}}</td>      
        <td>{{$order->address}}</td>      
        <td>{{$order->country}}</td>      
        <td>{{$order->city}}</td>      
    </tr>
@endforeach
  </tbody>
</table>
           </div>
        </div>



        <div class="col-4">
            <div class="row">
            <div class="box">
    <div class="container">
        <div>
            <h3>Add Country</h3>
        </div>
    <form method='post' action="{{route('admin.addCount')}}">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Add Country</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" require>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
            </div>

<div class="row">

    <div class="box">
        <div class="container">
            <h3>Add City</h3>
        <form method='POST' action="{{route('admin.addCity')}}">
            @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Select Country</label>
        <select class="form-select" aria-label="Default select example" name="country_id" required>
            <option selected disable>Open this select menu</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Add City</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>

    </div>
</div>

        </div>

        </div>

</div>


<div>
    <div class="row">



            <div class="col-4">
                <div class="box">
                <table class="table">
  <thead>
    <tr>
      <th scope="col">Country Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($countries as $country)
    <tr>
     
            <td>{{$country->name}}</td>
    </tr>
    @endforeach
 
</tbody>
</table>
                </div>
            </div>



            <div class="col-4">
                <div class="box">
                <table class="table">
  <thead>
    <tr>
      <th scope="col">Country Name</th>
      <th scope="col">City Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cities as $city)
    <tr>
            <td>{{$city->countries()->first()->name}}</td>
            <td>{{$city->name}}</td>
    </tr>
    @endforeach
 
</tbody>
</table>
                </div>
            </div>
    

</div>
</div>

</section>
    </div>
    </div>
    </div>

    @endsection

