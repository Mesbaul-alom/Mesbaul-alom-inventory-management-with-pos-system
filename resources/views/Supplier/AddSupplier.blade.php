
 @extends('./layout_master')
{{-- section id is yeild name  --}}
@section('admin')
 <div class="content-page center">
    <div class="content">
        <!-- Start Content-->
     <div class="container-fluid">
 <div class="row" style="padding:30px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Add Supplier</h3>

                <form method="POST" class="parsley-examples" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" parsley-trigger="change"  placeholder="Enter Your Name" class="form-control" id="product_code" />
                        @error('name')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="father_name" class="form-label">father_name<span class="text-danger">*</span></label>
                        <input type="text" name="father_name" parsley-trigger="change"  placeholder="Enter father_name" class="form-control" id="father_name" />
                        @error('father_name')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mother_name" class="form-label">mother_name<span class="text-danger">*</span></label>
                        <input type="text" name="mother_name" parsley-trigger="change" placeholder="Enter mother_name" class="form-control" id="mother_name" />
                        @error('mother_name')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                       <div class="mb-3">
                        <label for="permanent_address" class="form-label">permanent_address<span class="text-danger">*</span></label>
                        <input type="text" name="permanent_address" parsley-trigger="change"  placeholder="permanent_address" class="form-control" id="permanent_address" />
                          @error('permanent_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label for="present_address" class="form-label">present_address<span class="text-danger">*</span></label>
                        <input type="text" name="present_address" parsley-trigger="change"  placeholder="Enter  present_address" class="form-control" id="present_address" />
                         @error('present_address')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                    </div>
                    <div class="col-lg-6" >

                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" parsley-trigger="change"  placeholder="Enter email" class="form-control" id="email" />
                        @error('email')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                         <h5 style="color: red">{{session('msg')}}</h5>
                    </div>

                      <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number<span class="text-danger">*</span></label>
                        <input type="number" name="mobile_number" parsley-trigger="change"  placeholder="Enter mobile_number" class="form-control" id="mobile_number" />
                        @error('mobile_number')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>

                     <div class="mb-3">
                       <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                       <input type="file" name="image" parsley-trigger="change"  class="form-control" id="image" />
                    @error('image')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                   </div>

                   <div class="mb-3">
                        <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" parsley-trigger="change"  placeholder="Enter username" class="form-control" id="username" />
                        @error('username')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password<span class="text-danger">*</span></label>
                        <input type="password" name="password" parsley-trigger="change"  placeholder="Enter password" class="form-control" id="password" />
                        @error('password')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    </div>
                     <div class=" text-center p-4">
                        <button class="btn btn-primary waves-effect waves-light"  id="submit" type="submit">SupplierSubmit</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                    </div>
                </form>
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end col -->
 </div>
 </div>
 </div>
 </div>
 <script>
 </script>
@endsection
