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
        <h4 class="box-title">Slider Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div class="row">
                        <div class="col-8">
                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Slider Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Title</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Desc</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Status</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody id="MySliders">
                        
                        </tbody>      

                        
                    </table>
                    <script>
                        function myFunction(){
                    
                            $.ajax({
                                url:'/admin/getSliders',
                                type:'get',
                                dataType:'json',
                                success:function(data){
                                    var sliders = ""
                                    $.each(data.sliders,function(key,value){
                                       
                                        sliders += `<tr>
                            <td><img src="{{asset('/upload/slider/${value.slider_img}')}}" alt="${value.title}"></td>
                            <td>${value.title}</td>
                            <td>${value.description}</td>
                            <td>`
                                if(value.status == 0)
                                
                sliders += `    <button onclick='updateStatus(${value.id})'  class="btn btn-danger">Inactive</button>`
                                else{
                sliders += `<button onclick='updateStatus(${value.id})'class="btn btn-success">Active</button>`
                                }
                sliders += `    </td>
                            <td>
                                <div class="d-flex d-flex justify-content-center align-items-center">

                                    <a href="{{url('/admin/updateSlider/${value.id}')}}" class="btn btn-success mr-2"><i class='ti-reload'></i></a>

                                    <button onclick='deleteSlider(${value.id})' class="btn btn-danger"><i class='ti-trash'></i></button>
                                </div>
                            </td>
                        </tr>`
                                    })
                                    $('#MySliders').html(sliders)
                                }
                            })
                        }
                        myFunction()



                        function deleteSlider(id){
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
                        type:'get',
                        url: '/admin/deleteSlider/'+id,
                        dataType: 'json',
                        success:function(data){
                            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Slider is deleted',
            showConfirmButton: false,
            timer: 1500
            })

            myFunction()
                                    
                        }
                    })

  }
})
                        }


function updateStatus(id){
    $.ajax({
                        type:'get',
                        url: '/admin/statusSlider/'+id,
                        dataType: 'json',
                        success:function(data){
                            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Slider is deleted',
            showConfirmButton: false,
            timer: 1500
            })

            myFunction()
                                    
                        }
                    })
}

               </script>
                </div>

                <div class="col-4">
                    <form action="{{route('admin.addSlider')}}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Title</span>
                         <input type="text" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" name="title">
                       </div>

                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">Description</span>
                         <input type="text" class="form-control" placeholder="Desc" aria-label="Username" aria-describedby="basic-addon1" name="description">
                       </div>

                       <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Image Slider</span>
                        <input type="file" class="form-control" name="slider_img">
                      </div>
                       

                       <div class="input-group mb-3 row">
                           <div class="col-5"></div>
                       <button class="btn btn-success col-3">Add</button>
                       </div>
                    </form>
                </div>
            </div>
                    
                </div>
                
                  
        <div>
        </div>
        </div>


           </div>
   </div>
    
</section>


</div>


</div>


        </section>   
         </div>
</div>



@endsection
