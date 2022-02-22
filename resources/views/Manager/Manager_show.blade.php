
 @extends('./layout_master')
 @section('admin')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">





                        <div class="row" style="padding-top: 50px">
                            <div class="col-md-12">
                                <div class="card">
            {{-- ////massage//// --}}

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
            {{-- ////massage//// --}}




                                    <div class="card-body">

                                        <h4 class="header-title">ManagerList</h4>

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>User Name</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th >Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach($Managershow as $manager)
                                                <tr>
                                                    <td>
                                                        <!-- <div class="avatar-sm mx-auto mb-4">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                                                                <img src="{{ asset($manager->image) }}" alt="" class="img-thumbnail rounded-circle">
                                                            </span>
                                                        </div> -->

                                                                <img src="{{ asset($manager->image) }}" alt="" class="img-thumbnail" height="90" width="90">



                                                    </td>
                                                    <td>{{$manager->username}}</td>
                                                    <td>{{$manager->fullname}}</td>
                                                    <td>{{$manager->email}}</td>

                                                    <td >

                                                 <a href="{{ route('manager.edit',$manager) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i> </a>

                                                 <a href="manager/delete/{{$manager->id}}"  class="btn btn-danger btn-sm" id="delete" ><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- SweetAlert2 -->



        @endsection
