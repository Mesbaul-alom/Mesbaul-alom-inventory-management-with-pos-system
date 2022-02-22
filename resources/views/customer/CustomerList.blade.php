@extends('./layout_master')
 {{-- section id is yeild name  --}}
 @section('admin')
 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">




                            <h4 class="header-title text-center p-4 ">Customer list</h4>
                            <div class="text-end">
                            <button type="button" class="btn btn-primary" style="background: #4E46A1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Customer</button>
                            </div>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>customer_name</th>
                                        <th>address</th>
                                        <th>email</th>
                                        <th>phone</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                              </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row">
                                        <input id="customer_id" type="text" name="customer_id" hidden>
                                        <div class="col-lg-6" >
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Customer Name</label>
                                        <input type="text"  name="customer_name" class="form-control" id="customer_name" >

                                        @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                      </div>
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Email</label>
                                        <input type="text"  name="email" class="form-control" id="email">
                                        @if($errors->has('email'))
                                        <div style="color:red"> {{$errors->first('email')}}</div>
                                        @endif
                                      </div>
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="address">
                                        @if($errors->has('address'))
                                        <div style="color:red"> {{$errors->first('address')}}</div>
                                        @endif
                                      </div>

                                      </div>
                                       <div class="col-lg-6" >
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Phone</label>
                                        <input type="TEXT"   name="phone" class="form-control your_class" id="phone">
                                        @if($errors->has('phone'))
                                        <div style="color:red"> {{$errors->first('phone')}}</div>
                                        @endif
                                      </div>
                                      <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Image</label>
                                        <input type="file" accept="image/*" name="image" onchange="loadFile(event)" parsley-trigger="change" value="{{old('image')}}"  class="form-control" id="file" />
                                        @if($errors->has('image'))
                                        <div style="color:red"> {{$errors->first('image')}}</div>
                                        @endif

                                        <p><img id="output" width="200" /></p>
                                      </div>

                                      </div>
                                      </div>
                                      <button class="btn btn-primary waves-effect waves-light" id="update"  style="background: #4e46a1"; type="submit">Add Customer</button>
                                 </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal fade" id="editCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form id="updateForm" enctype="multipart/form-data">
                                          @csrf
                                      <input id="customer_id2" type="text" name="customer_id" hidden>
                                      <div class="row">
                                        <div class="col-lg-6" >
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Customer Name</label>
                                        <input type="text"  name="customer_name" class="form-control" id="edit_customer_name" required value="">
                                        @if($errors->has('customer_name'))
                                        <div style="color:red"> {{$errors->first('customer_name')}}</div>
                                        @endif
                                      </div>
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Email</label>
                                        <input type="text"  name="email" class="form-control" id="email2">
                                        @if($errors->has('email'))
                                        <div style="color:red"> {{$errors->first('email')}}</div>
                                        @endif
                                      </div>
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="address2" >
                                        @if($errors->has('address'))
                                        <div style="color:red"> {{$errors->first('customer_name')}}</div>
                                        @endif
                                      </div>

                                      </div>
                                       <div class="col-lg-6" >
                                      <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Phone</label>
                                        <input type="text"   name="phone" class="form-control" id="phone2">
                                        @if($errors->has('phone'))
                                        <div style="color:red"> {{$errors->first('phone')}}</div>
                                        @endif
                                      </div>
                                      <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Image</label>
                                        <input type="file"  name="image"  parsley-trigger="change" value="{{old('image')}}"  class="form-control" id="file" />
                                        @if($errors->has('image'))
                                        <div style="color:red"> {{$errors->first('image')}}</div>
                                        @endif

                                        {{-- <label class="col-form-label" for="file" style="cursor: pointer;">Upload Image</label>
                                        <input type="file"  accept="image/*" name="image" id="file"  class="form-control"  onchange="loadFile(event)" style="display: none;"> --}}

                                 {{-- <p><img id="output" width="200" /></p> --}}
                                      </div>
                                      </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary update">Update</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                  {{-- Delete Modal --}}
                  <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Confirm to Delete Data ?</h4>
                                <input id="customer_id3" type="text" name="customer_id3" hidden>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary confirm_delete">Yes Delete</button>
                            </div>
                        </div>
                    </div>
                  </div>
                  {{-- End - Delete Modal --}}


                  <SCript>
document.querySelector(".your_class").addEventListener("keypress", function (evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
});


                  </SCript>


<script>
$(document).ready(function () {
  fetchcustomer();
      function fetchcustomer() {
        console.log("sss");
          $.ajax({
              type: "GET",
              url: "/fetch-customers",
              dataType: "json",
              success: function (response) {
                  console.log(response);
                  $('tbody').html("");
                  $.each(response.customers, function (key, item) {
                      $('tbody').append('<tr>\
                         \
                          <td>' + item.customer_name + '</td>\
                          <td>' + item.address + '</td>\
                          <td>' + item.email + '</td>\
                          <td>' + item.phone + '</td>\
                          <td><button type="button" value="' + item.id + '" class="btn btn-primary customer btn-sm" ><i class="fas fa-edit"></i></button>\
                        <button type="button" value="' + item.id + '" class= "btn btn-danger deletecustomer btn-sm" id="deletecustomer" ><i class="fas fa-trash"></i></button>\
                      \</tr>');
                  });
              }
          });
        }
$(document).on('click', '.customer', function (e) {
            e.preventDefault();
            var stud_id = $(this).val();
            // alert(stud_id);
            $('#editCustomer').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-customer/" + stud_id,
                success: function (response) {
                  console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.customer.message);
                        $('#editModal').modal('hide');
                    } else {
                      $('#edit_customer_name').val(response.customer.customer_name);
                      $('#customer_id2').val(response.customer.id);
                      $('#address2').val(response.customer.address);
                      $('#email2').val(response.customer.email);
                      $('#phone2').val(response.customer.phone);
                      $('#city2').val(response.customer.city);
                      $('#country2').val(response.customer.country);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });
        $(document).on('click', '.update', function (e) {
            e.preventDefault();
             $stud_id = $('#customer_id2').val();
            // $id = $('#stud_id').val();
            console.log($stud_id);
            $data = $("#updateForm").serialize();
            console.log($data);
            $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 $posturl= "{{url('/update-customer/')}}"+'/'+$stud_id;
                 console.log($posturl);
                $.ajax({
                type: "POST",
                url: $posturl,
                data: $data,
                dataType: "json",
                success: function (response) {
                     console.log(response);
                     $('#editCustomer').modal('hide');
                     fetchcustomer();
                },
                error: function(e)
                {
                  console.log(e);
                }
            });
        });
    $(document).on('click', '.deletecustomer', function (e) {
             $stud_id = $(this).val();
            console.log($stud_id);
            $('#DeleteModal').modal('show');
            $('#customer_id3').val($stud_id);
        });
        $(document).on('click', '.confirm_delete', function (e) {
            $id = $('#customer_id3').val();
            console.log($id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "/delete-customer/" +$id,
                dataType: "json",
                success: function (response) {
                            $('#DeleteModal').modal('hide');
                            fetchcustomer();
                }
            });
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>

@endsection
