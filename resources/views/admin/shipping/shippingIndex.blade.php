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
        <div class="col-12">
            <div class="box">
           
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
    <td>{{$order->id_client}}</td>
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
    <td><a class="btn btn-danger" href="{{url('/admin/statusOrder/'.$order->id)}}">Invalid</a></td>
    @else
    <td><a class="btn btn-success" href="{{url('/admin/statusOrder/'.$order->id)}}">Valid</a></td>
    @endif


    </tr>
@endforeach
  </tbody>
</table>
{{$orders->links();}}

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
                                                        <th scope="col">Country ID</th>
                                                        <th scope="col">Country Name</th>
                                                        <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="plz">
                                                    
                                                    
                                                    </tbody>
                                                    </table>
                                                                    </div>
                                        </div>



                                        
                                        <script>
                                            function getCountries(){


$.ajax({
url:'/admin/getCountries',
type:'get',
dataType:'json',
success:function(data){

var countries = "";
var cities = "";
var option = ""
$.each(data.countries,function(key,value){

    countries +=
                 `<tr>            
                      <td>${value.id}</td>
                      <td>${value.name}</td>
                      <td><button onclick='removeCountry(${value.id})' style='background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    overflow: hidden;
    outline: none;' ><i class='ti-trash'></i></button></td>
                  </tr>`

    option += ` <option value='${value.id}'>${value.name}</option> `
    
})


$.each(data.cities,function(key,value){

cities +=
             `<tr>  
                <td>${value.country_id}</td>
                <td>${value.name}</td>
                <td><button onclick='removeCity(${value.id})' style='background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    overflow: hidden;
    outline: none;' ><i class='ti-trash'></i></button></td>
              </tr>`
})


$('#plz').html(countries)
$('#citiess').html(cities)
$('#selectMENU').html(option)

}
})


}

getCountries()


function removeCountry(id){


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
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )

                    $.ajax({
                url:'/admin/removeCountry/'+id,
                type:'get',
                dataType:'json',
                success:function(data){
                    getCountries()
                }
            }
                )
                }
                })
        }




        function removeCity(id){
            console.log('first')
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
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )

                    $.ajax({
                url:'/admin/removeCity/'+id,
                type:'get',
                dataType:'json',
                success:function(data){
                    getCountries()
                }
            }
                )
                }
                })
        }


                                        </script>


                                        <div class="col-4">
                                                                <div class="box">
                                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Country ID</th>
                                                    <th scope="col">City Name</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="citiess">
                                                
                                                
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

                                                        <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Add Country</label>
                                                    <input type="name" class="form-control"  aria-describedby="emailHelp" name="name" id="countryy" require>
                                                </div>
                                                <button type="submit" class="btn btn-primary" onclick="addCountryF()">Submit</button>
                                               
                                                    </div>
                                                </div>
                                                            </div>

                                                <div class="row">

                                                    <div class="box">
                                                        <div class="container">
                                                            <h3>Add City</h3>
                                                      
                                                            
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Select Country</label>
                                                        <select class="form-select" aria-label="Default select example" name="country_id" id="selectMENU" required>
                                                        </select>
                                                    
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Add City</label>
                                                        <input type="text" id="cityy" class="form-control" id="exampleInputPassword1" name="name" required>
                                                    </div>
                                                    <button type="submit" onclick="addCityF()" class="btn btn-primary">Submit</button>
                                                        </div>

                                                    </div>
                                                </div>

                                        </div>


                                </div>

            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                function addCityF(){
                    $.ajax({
                        url:'/admin/addCity',
                        type:'get',
                        dataType:'json',
                        data:{Country:$('#selectMENU').val(),City:$('#cityy').val()},
                        success:function(data){
                            Swal.fire({
                                title: 'City has been added',
                                width: 600,
                                padding: '3em',
                                color: '#716add',
                                background: '#fff url(/images/trees.png)',
                                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url("/images/nyan-cat.gif")
                                    left top
                                    no-repeat
                                `
                                })
                            getCountries()
                            $('#cityy').empty()
                        }
                    })
                }


console.log('first')

                function addCountryF(){
console.log('first')

                    $.ajax({
                        url:'/admin/addCountry',
                        type:'get',
                        dataType:'json',
                        data:{Country:$('#countryy').val()},
                        success:function(data){
                            Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Country has been added',
  showConfirmButton: false,
  timer: 1500
})           
                 getCountries()
                            $('#countryy').empty()
                        }
                    })
                }

                console.log('first')
//                 function getShipping(){
// console.log('first')
//     // $.ajax({
//     //                     url:'/admin/getOrders',
//     //                     type:'get',
//     //                     dataType:'json',
//     //                     success:function(data){

//     //                             console.log(data)

//     //                     }}
//     //                     )
// }

// getShipping()

            </script>

          
</section>
    </div>
    </div>
    </div>

    @endsection
