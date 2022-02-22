@extends('./layout_master')
{{-- section id is yeild name  --}}
@section('admin')
 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
     <div class="container-fluid">
 <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h3 class="header-title">Return Product</h3>
                <form method="POST" action="{{route('update.return.product',$return_product->id)}}" id="myForm" name="myForm" class="parsley-examples" enctype="multipart/form-data">



                    @csrf
                    <div class="row">
                        <div class="col-lg-6" >
                            <div class="mb-3">
                                <h5>Product Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                     <select id="productId" name="product_name" class="form-control"  >
                                        <option disabled selected >Select Product</option>
                                            @foreach ($purchases as $purchase )
                                            <option value="{{$return_product->product_id}}"  @if($purchase->product->id==$return_product->product_id) selected="selected"  @endif  value="{{$purchase->product->id}}"  >{{$purchase->product->name}}</option>
                                            @endforeach
                                     </select>

                                      @error('product_name')
                                         <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                                </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Return Quantity Amount<span class="text-danger">*</span></label>
                        <input type="text" name="quantity" parsley-trigger="change" value="{{$return_product->return_quantiy}}" placeholder="Enter quantity for return" class="form-control" id="name" />
                        @error('quantity')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror

                        {{-- @isset($quantity)
                            {{$quantity}}
                        @endisset --}}
                        @if (Session::has('quantity'))
                        <span class="text-danger"> {{Session::get('quantity')}}</span>

                        @endif
                    </div>


                    </div>
                    <div class="col-lg-6" >

                        <div class="mb-3">
                            <h5>Suppliar name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="suppliar" class="form-control " id="supply_select"  >
                                     <option>Select supplier</option>
                                     <option value="{{$return_product->supplier->id}}" selected="selected">{{$return_product->supplier->name}}</option>
                                 </select>
                                  @error('suppliar_name')
                                     <span class="text-danger">{{ $message }}</span>
                                  @enderror
                             </div>
                            </div>
                    </div>
                     <div class=" text-center p-4">
                        <button class="btn btn-primary waves-effect waves-light"  id="submit" type="submit">Submit request</button>

                    </div>
                    </div>
                </form>
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-3"></div>
 </div>
    </div>
    </div>
 </div>



 <script>








    $(function(){




        $('#productId').change(function() {

            $("#supply_select").find('option').remove();
            let productid=$('#productId option:selected').val();
           // alert(productid);
        axios.get(`/get/Suppliarnamebyproduct/${productid}`)
      .then(function ({data:{supplier_names}}) {
        // handle success

console.log(supplier_names);

$.each(supplier_names, function (index, value) {
    $("#supply_select").append(new Option(value,index));
});

      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        // always executed
      });





    });











    });
     </script>
@endsection
