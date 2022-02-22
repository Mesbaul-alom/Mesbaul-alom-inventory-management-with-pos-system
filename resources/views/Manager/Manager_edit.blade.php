 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')

 <div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


 <div class="row" style="padding-top: 50px">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Update Manager</h3>

                <form method="POST"  class="parsley-examples" enctype="multipart/form-data">

                    @csrf
                  <input type="hidden" name="id" value="{{ $manager->id }}">
                    <input type="hidden" name="old_img" value="{{ $manager->image }}">
                    <div class="row">
                        <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="userName" class="form-label">User Name<span class="text-danger">*</span></label>
                        <input type="text" name="username" parsley-trigger="change" required placeholder="Enter user name" value="{{$manager->username}}" class="form-control" id="userName" />
                        @if($errors->has('username'))
                        <div style="color:red"> {{$errors->first('username')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="FullName" class="form-label">Full Name<span class="text-danger">*</span></label>
                        <input type="text" name="fullname" value="{{$manager->fullname}}" parsley-trigger="change" required placeholder="Enter Full name" class="form-control" id="fullName" />
                        @if($errors->has('fullname'))
                        <div style="color:red"> {{$errors->first('fullname')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email address<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{$manager->email}}" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress" />
                        @if($errors->has('email'))
                        <div style="color:red"> {{$errors->first('email')}}</div>
                        @endif
                    </div>
                        </div>
                        <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image"  value="{{$manager->image}}" onchange="loadFile(event)" parsley-trigger="change"  placeholder="Upload Image" class="form-control"  />
                    </div>
                    <h5 style="color: red">{{session('msg')}}</h5>
                    <p><img id="output" width="200" /></p>
                       <div class="card">
                            <img src="{{ asset($manager->image) }}" class="card-img-top" style="height: 130px; width: 280px;">

                        </div>
                        </div>

                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                    </div>
                </form>
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-2"></div>
 </div>
        </div>
    </div>
 </div>
 <script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
@endsection
