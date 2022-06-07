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
        <h4 class="box-title">Product Table</h4>
    </div>  
    <div>
        <div class="box">
            
           
                <div class="table-responsive" style="padding: 20px">
                    <div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="complex_header_length"><label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="complex_header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                        <thead>
                            <tr role="row"><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product Image</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 105px;">Product En</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 58px;">Product Fr</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Product Qty</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 40px;">Status</th><th class="sorting" tabindex="0" aria-controls="complex_header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 62px;">Action</th></tr>
                        </thead>
                      
                        <tbody id="products">
                      
                        </tbody>      

                        
                    </table>

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

<script>


function getProds(){
    $.ajax({
    type:'get',
    url:'/admin/getProduct',
    dataType:'json',
    success:function(data){
        var myTr = ""

        $.each(data.data.data, function(key,value){
        myTr += `        <tr>
                            <td><img src="{{asset('upload/productPhoto/${value.product_thambnail}')}}" alt="" width="100px" height="100px" style="object-fit: contain"></td>
                            <td>${value.product_name_en}</td>
                            <td>${value.product_name_fr}</td>
                            <td>${value.product_qty}</td>
                            <td> `
                            if(value.status == 0)
                            myTr += `<button onclick='updateStatus(${value.id})' class="btn btn-danger">Invalid</button>`
                                else{
                            myTr +=     ` <button onclick='updateStatus(${value.id})' class="btn btn-success">Valid</button>`
                                }
                                myTr += ` </td>
                            <td>
                            
                                <div class="d-flex d-flex justify-content-center align-items-center">
                            
                                    <a href='#' class="btn btn-success"><i class='ti-reload'></i></a>
                            
                                    <button onclick='deleteProduct(${value.id})' id="del" class="btn btn-danger ml-2"><i class='ti-trash'></i></button>
                                </div>
                            </td>
                        </tr> `
        })

        $('#products').html(myTr)

    }

})
}

getProds()

function updateStatus(id){
    $.ajax({
        type:'get',
        url:'/admin/statusProduct/'+id,
        dataType:'json',
        success:function(data){
            
            getProds()

            Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Status updated',
  showConfirmButton: false,
  timer: 1500
})
        }
    })
}

function deleteProduct(id){
   
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
        url:'/admin/deleteProduct/'+id,
        dataType:'json',
        success:function(data){
            
            getProds()

            Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Producted deleted',
  showConfirmButton: false,
  timer: 1500
})
        }
    })
  }


})

}



</script>

@endsection
