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

<div class="row">


    <div class="box-body col-12">
<section class="content p-5">
   <div>
    <div class="box-header">						    
        <h4 class="box-title">Review Table</h4>
    </div>  
    <div>
        <div class="box">
            
      <div class="col-12 p-5">
      <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">product id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Review</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="reviews">
               
                    
                </tbody>
        </table>
      </div>
                
            </div>
                    
                </div>
                
                  
        <div>
        </div>
        </div>






        </section>   
         </div>
</div>





<script>
                function getReviews(){

                    $.ajax({
                        type:'get',
                        url: '/admin/getReview',
                        dataType: 'json',
                        success:function(data){
                       
                            var review = "";
                            // @php
					// 	$id_user = $review->user_id;
					// 	$user = App\Models\User::where('id',$id_user)->first();
					// 	$profile_picture = $user->profile_photo_path;
					// 	$username=$user->name;
					// @endphp

            $.each(data.reviews, function(key,value){
                


            review += `<tr>                       
                          <th scope="row"><img src="{{asset('upload/clientPhoto/${value.picture_path}')}}" class="img-fluid rounded-start" alt="..." style="width:60X;height:60px;object-fit: contain;"></th>
                          <th scope="row">${value.product_id}</th>
                          <th scope="row">${value.user_name}</th>
                          <th scope="row">${value.summary}</th>
                          <th scope="row">${value.comment}</th>
                          <th scope="row">${value.created_at}</th>
                          <th scope="row"><button onclick='updateStatus(${value.id})' class="btn ${value.status == 'Invalid' ? 'btn-danger' : 'btn-success'}">${value.status}</button></th>                        
                          <th><button id="delete" onclick='deleteReview(${value.id})' class="btn btn-info">Delete it</button></th>
                    </tr>` 
            });

                    $('#reviews').html(review)

                                    
                        }
                    })
                }

                getReviews()

 



                function deleteReview(id){


                    $(function(){
                $(document).on('click','#delete',function(e){
                    
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
                

                $.ajax({
                        type:'get',
                        url: '/admin/deleteReview/'+id,
                        dataType: 'json',
                        success:function(data){

                            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'User is deleted',
            showConfirmButton: false,
            timer: 1500
            })

            getReviews()
                                    
                        }
                    })




            }
            })


                })
                
                })





                    
                }


            function updateStatus(id){

              $.ajax({
                        type:'get',
                        url: '/admin/updateStatusReview/'+id,
                        dataType: 'json',
                        success:function(data){

                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Complete whit success',
                            showConfirmButton: false,
                            timer: 1500
                            })

                            getReviews()
                                    
                        }
                    })



            }
    
</script>



@endsection
