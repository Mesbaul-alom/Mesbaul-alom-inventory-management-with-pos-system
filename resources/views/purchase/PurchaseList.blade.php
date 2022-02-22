
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
                                        <th>purchase_date</th>
                                        <th>Product Name</th>
                                        <th>product_quantity</th>
                                        <th>purchase_price</th>

                                        <th>purchase_unit </th>

                                        <th>purchase_note</th>
                                           <th>QRCode</th>

                                        <th class="">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->product->name }}</td>
                                        <td>{{ $purchase->product_quantity }}</td>
                                        <td>{{ $purchase->purchase_price }}</td>
                                        <td>{{ $purchase->purchase_unit }}</td>
                                        <td>{{ $purchase->purchase_note }}</td>
                                        <td> <a href="#"   class="btn btn-success barcode" data-id="{{$purchase->product->id}}">Generate</a></td>
                                        <td class="">
                                    <a href="{{ route('edit.purchase',$purchase->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <button class="btn btn-danger"  id="message" onclick="delete({{$product->id}})">Delete</button> --}}
                                    <a href="{{ route('delete.purchase',$purchase->id) }}" id="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>

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



















