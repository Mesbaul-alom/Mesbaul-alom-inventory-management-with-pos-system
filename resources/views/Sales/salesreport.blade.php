
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
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <form method="POST" action="">
                            @csrf
                            <div class="dev">
                                <div class="row" style="padding-top: 50px">

                                    <div class="col-md-1" s>

                                        <button type="submit" name="total" class="btn btn-success" value="4">Total Sales Report</button>
                                       </div>
                                   <div class="col-md-1">
                                    <button type="submit" name="daily" class="btn btn-success" value="1">Daily Sales Report</button>

                                   </div>
                                   <div class="col-md-1">

                                    <button type="submit" name="month"  class="btn btn-success" value="2">Monthly Sales Report</button>

                                   </div>
                                   <div class="col-md-1">

                                    <button type="submit" name="year" class="btn btn-success" value="3">Yearly Sales Report</button>
                                   </div>
                                   <div class="col-md-7" >


                                   </div>
                                   <div class="col-md-1" s>

                                 @if (isset($tpdf))
                                  <a href="/salespdf" name="" class="btn btn-success" >Export Pdf</a>
                                  @elseif (isset($dpdf))
                                  <a href="/dpdf" name="" class="btn btn-success" >Export Pdf</a>
                                  @elseif (isset($mpdf) )
                                  <a href="/mpdf" name="" class="btn btn-success" >Export Pdf</a>
                                  @elseif (isset($ypdf))
                                  <a href="/ypdf" name="" class="btn btn-success" >Export Pdf</a>

                                   @endif
                                </div>
                                   {{--
                                    <button type="submit" name="total" class="btn btn-success" value="4">Export Pdf</button>
                                  --}}
                                </div>
                            </div>
                        </form>



                        <div class="card-body">
                            <h4 class="header-title" style="text-align: center">Sales Report</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>sales_date</th>
                                        <th>created_by</th>
                                        <th>customer_name</th>
                                        <th>product_name</th>
                                        <th>sales_code</th>
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
                                    @foreach($pos as $data)

                                    @php
                                    $serial++;

                               @endphp
                                    <tr>

                                       <td>{{ $serial}}</td>
                                       <td>{{ $data->sales_date}}</td>
                                       <td>{{ $data->created_by}}</td>
                                       <td>{{ $data->customer_name}}</td>
                                       <td>{{ $data->item_name}}</td>
                                       <td>{{ $data->sales_code}}</td>
                                       <td>{{ $data->quantity}}</td>
                                       <td>{{ $data->price}}</td>
                                       <td>{{ $data->paid_payment}}</td>
                                       <td>{{ $data->due}}</td>

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



















