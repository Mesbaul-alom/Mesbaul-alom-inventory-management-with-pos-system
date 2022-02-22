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
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mx-sm-1 mb-1">
                <label for="">Are you want to Approve this Return ??</label>
                <button id="submit"    data-dismiss="modal" class="btn btn-success mb-2">Yes</button>
              <button id="closemodal"  data-dismiss="modal" class="btn btn-danger mb-2">No</button>
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
            <div class="row" style="padding-top: 50px">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title" style="text-align: center">Return Product List</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Product name</th>
                                        <th>Supplier Name</th>
                                        <th>quantity</th>
                                        <th> status</th>
                                        @if ( $user->can('product.update') && $user->can('product.update'))
                                        <th class="text-end">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($returnproduct_list as $list)
                                    <tr>
                                        <td>{{ $list->Product->name }}</td>
                                        <td>{{ $list->Supplier->name }}</td>
                                        <td>{{ $list->return_quantiy }}</td>
                                        @if ($list->approve_status!=0)
                                       <td><button disabled type="button" class="btn btn-success">Approved</button></td>
                                       @else
                                       <td><button disabled type="button" class="btn btn-danger">Pending</button></td>
                                        @endif
                                        <td class="text-end">
                                         @if ( $user->can('product.update') && $user->can('product.update'))
                                         @if ($list->approve_status!=1)
                                    <a href="{{ route('edit.return.product',$list->product->id) }}" class="btn btn-primary">Edit</a>
                                    @endif
                                    <a href="{{ route('delete.return.product',$list->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                    @if ($user->can('admin.create'))    {{-- only Super admin can approve this  --}}
                                    @if ($list->approve_status!=1)
                                      <a href="#" name="app"  data-returnid="{{$list->id}}" class="btn btn-success approve">Approve</a>
                                      @endif
                                      @endif
                                    @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
                <div class="col-2"></div>
            </div>
        </div>
    </div>
 </div>
 {{-- <script>Swal.fire({
     title: 'Error!',
     text: 'Do you want to continue',
     icon: 'error',
     confirmButtonText: 'Cool'
   })</script>
  --}}
  <script>
 $(function(){
        let rCollection="";
        let approveButtons = document.querySelectorAll('.approve');
        approveButtons.forEach(approveButton=>{
            approveButton.addEventListener('click',function(event){
                let returnId = this.dataset.returnid;
                //console.log(returnId)
                axios.get(`/approve/returnproduct/${returnId}`)
                .then(function ({data:{returnCollection}}) {
                        console.log(returnCollection);
                        rCollection=returnCollection
                        //console.log(rCollection);
                        $('#mymodal').modal('show');
                        $('#closemodal').click(function(){
                            $('#mymodal').modal('hide');
                        });
                }).catch(function (error) {
                    // handle error
                    console.log(error);
            });
            })
        });
        $('#submit').click(function(){
            var url="/approve/returnproduct";
            axios.post(url,rCollection)
            .then(function (response) {
                 location.reload();
            })
            .catch(function (error) {
                console.log(error.response.data);
            });
            $('#mymodal').modal('hide');
        });
  });
  </script>
 @endsection
