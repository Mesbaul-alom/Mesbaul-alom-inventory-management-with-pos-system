
 @extends('./layout_master')
 @section('admin')

 <div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">


                            @if(session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>{{session('update')}}</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif


                            @if(session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>{{session('delete')}}</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif


                        <div class="card-body">

                            <h4 class="header-title">SupplierList</h4>

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>

                                        <th>Email</th>
                                        <th>Mobile_number</th>
                                        <th>Username</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as  $supplier)
                                    <tr>
                                        <td>
                                         <img src="{{('/admin_img/'.$supplier->image)}}" alt="" class="img-thumbnail" height="90" width="90">
                                        </td>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->mobile_number}}</td>
                                        <td>{{$supplier->username}}</td>

                                        <td class="text-end">

                                     <a href="{{url('supplier/edit/'.$supplier->id)}}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> Edit</a>

                                     <a href="{{url('supplier/destroy/'.$supplier->id)}}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
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
@endsection
