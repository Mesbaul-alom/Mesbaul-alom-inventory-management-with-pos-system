
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')
 @php
 $user =Auth::user()
 @endphp

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentname"></h5>

          <a href="#"><i id="closemodal" class="fas fa-window-close"></i></a>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group mx-sm-1 mb-1">


                <label for="">Print Quantity</label>
                <input id="submit_id" type="hidden">
                <input id="print_quantity"  class="form-control-sm" type="text">
                <button id="submit"    data-dismiss="modal" class="btn btn-success mb-2">Print</button>
              </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>


 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Purchase List</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sales Date</th>
				  <th>Product Code</th>
				  <th>Customer Name</th>
                  <th>Product Name</th>
                  <th>Price</th>
				  <th >Total Paid</th>
                  <th>Total Paid</th>
				  <th>Created by</th>
				  <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($sales as  $sale)
                                    <tr>
                                        <td>{{$sale->sales_date}}</td>
                                        <td>{{$sale->sales_code}}</td>
                                        <td>{{$sale->customer_name}}</td>
                                        <td>{{$sale->item_name}}</td>
                                        <td>{{$sale->price}}</td>
                                        <td>{{$sale->paid_payment}}</td>

                                        <td>{{$sale->payment_status}}</td>
                                        <td>{{$sale->created_by}}</td>
                                        <td> <a href="{{ route('pos.destroy', $sale->id ) }}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                     </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
 </div>




<script>

$(function(){


$('.barcode').click(function(){


    let product_id  = $(this).data('id');

    $('#submit_id').val(product_id);




//alert("hello");
$('#mymodal').modal('show');

// $('#print_quantity').val('show');
$('#closemodal').click(function(){
    $('#mymodal').modal('hide');

});

$('#submit').click(function(){


let print_quantity =$('#print_quantity').val();
let product_id =$('#submit_id').val();

// alert(product_id);
// alert(print_quantity);
$('#mymodal').modal('hide');
url=`/get/barcode/${product_id}/${print_quantity}`;
window.open(url);




 });



});




});



</script>





 @endsection



















