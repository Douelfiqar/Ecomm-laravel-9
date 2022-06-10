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
    <section class="content p-5">
       <div>
        <div class="box-header">						
            <h4 class="box-title">User Table</h4>
        </div>  
        <div>
            <div class="box">
                
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">email_verified_at</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="users">
                       
                        
                    </tbody>
            </table>
                    
                </div>
                        
                    </div>
                    
                      
            <div>
            </div>
            </div>
    
    
    
    
    
    
            </section>   
             </div>
    </div>


    <script>
        function getUsers(){

            $.ajax({
                type:'get',
                url: '/admin/getAdmins',
                dataType: 'json',
                success:function(data){

                    var users = "";

    $.each(data.data, function(key,value){
    users += `<tr>                       
                            <th scope="row"><img src="{{asset('upload/adminPhoto/${value.profile_photo_path}')}}" class="img-fluid rounded-start" alt="..." style="width:60X;height:60px;object-fit: contain;"></th>
                            <th scope="row">${value.name}</th>
                            <th scope="row">${value.email}</th>
                            <th scope="row">${value.email_verified_at}</th>
                            <th scope="row">${value.created_at}</th>
                            <th><button id="delete" href="/admin/deleteUser" onclick='deleteUser(${value.id})' class="btn btn-info">Delete it</button></th>
                            </tr>` 
    });


            $('#users').html(users)

                            
                }
            })
        }

        getUsers()


        function deleteUser(id){
            
            Swal.fire('Any fool can use a computer');


            
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
                url: '/admin/deleteUser/'+id,
                dataType: 'json',
                success:function(data){

                    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Admin is deleted',
    showConfirmButton: false,
    timer: 1500
    })

    getUsers()
                            
                }
            })




    }
    })




            
        }

</script>
@endsection
