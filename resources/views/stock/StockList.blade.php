
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')
 @php
 $user =Auth::user()
 @endphp

 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row " style="padding-top:30px;">
                <div class="col-12">

                    <div class="card p-4">


                        <form method="POST" action="">
                            @csrf
                            <div class="dev">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Product Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                             <select name="product_id" class="form-control"  >
                                        <option>Select Product</option>
                                         @foreach($products as $product)
                                             <option value="{{ $product->id }}" >{{ $product->name }}</option>
                                                 @endforeach
                                             </select>
                                              @error('category_id')
                                                 <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                         </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Supplier Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                 <select name="supplier_id" class="form-control"  >
                                            <option>Select Supplier</option>
                                             @foreach($suppliers as $supplier)
                                             <option value="{{ $supplier->id }}" >{{ $supplier->name }}</option>
                                                     @endforeach
                                                 </select>
                                                  @error('category_id')
                                                     <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                             </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h5>Date From <span class="text-danger">*</span></h5>
                                                <input type="date" name="date_from" parsley-trigger="change"  placeholder="Enter purchase date" class="form-control" id="purchase_date" />
                                                </div>
                                                <div class="col-md-2">
                                                    <h5>Date to <span class="text-danger">*</span></h5>
                                                    <input type="date" name="date_to" parsley-trigger="change"  placeholder="Enter purchase date" class="form-control" id="purchase_date" />
                                                    </div>
                                           <div class="col-md-2" style="padding-top: 35px">
                                            <button  class="btn btn-primary waves-effect waves-light"  id="submit" type="submit">Search</button>
                                           </div>
                                </div>
                            </div>
                        </form>



                        <div class="card-body">
                            <h4 class="header-title">Stock List</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>purchase_date</th>
                                        <th>product_name</th>
                                        <th>product_Category</th>
                                        <th>product_quantity</th>
                                        <th>product_total_price</th>
                                        <th>Pay Price</th>
                                        <th>Due Price</th>



                                    </tr>
                                </thead>
                                @php
                                $serial=0;

                           @endphp
                                <tbody>
                                    @foreach($stocks as $stock)

                                    @php
                                    $serial++;

                               @endphp
                                    <tr>

                                        <td>{{ $serial }}</td>
                                        <td>{{ $stock->product_add_date }}</td>
                                        <td>{{ $stock->product->name }}</td>
                                        <td>{{ $stock->product->category->category_name }}</td>
                                        @if ( $stock->product_stock_count <"5")
                                         <td><a class="btn btn-danger ">{{ $stock->product_stock_count }}</a></td>
                                         @else
                                          <td><a class="btn btn-primary ">{{ $stock->product_stock_count }}</a></td>
                                          @endif
                                          <td><a class="btn btn-primary ">{{ $stock->purchase->purchase_price }}</a></td>
                                          <td><a class="btn btn-success">{{ $stock->purchase->purchase_price }}</a></td>
                                          <td><a class="btn btn-danger ">0</a></td>
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




 @endsection



















