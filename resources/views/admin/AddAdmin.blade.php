
 @extends('./layout_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="content-page center">
   <div class="content">

       <!-- Start Content-->
       <div class="container-fluid">


<div class="row" style="padding-top: 50px">
    <div class="col-lg-3"></div>
   <div class="col-lg-6">

       <div class="card">
           <div class="card-body">
               <h3 class="header-title">Add Admin</h3>

               <form method="POST" action="{{url('/add/admin')}}"   class="parsley-examples" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                   <div class="col-lg-6" >
                          <div class="mb-3">
                    <label for="userName" class="form-label">User Name<span class="text-danger">*</span></label>
                    <input type="text" name="username" value="{{old('username')}}" parsley-trigger="change"  class="form-control" id="userName" />

                    @if($errors->has('username'))
                    <div style="color:red"> {{$errors->first('username')}}</div>
                    @endif

                </div>
                <div class="mb-3">
                    <label for="FullName" class="form-label">Full Name<span class="text-danger">*</span></label>
                    <input type="text" name="fullname" value="{{old('fullname')}}" parsley-trigger="change"  class="form-control" id="fullName" />
                    @if($errors->has('fullname'))
                    <div style="color:red"> {{$errors->first('fullname')}}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="emailAddress" class="form-label">Email address<span class="text-danger">*</span></label>
                   <input type="email" name="email" parsley-trigger="change" value="{{old('email')}}" class="form-control" id="emailAddress" />
                   @if($errors->has('email'))
                   <div style="color:red"> {{$errors->first('email')}}</div>

                   @endif
                   <h5 style="color: red">{{session('msg')}}</h5>
                </div>
            </div>
                   <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image" parsley-trigger="change"   class="form-control" id="image" />
                        @if($errors->has('image'))
                        <div style="color:red"> {{$errors->first('image')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="pass1" class="form-label">Password<span class="text-danger">*</span></label>
                        <input id="pass1" name="password" type="password" value="{{old('password')}}" placeholder="Password" class="form-control" />
                        @if($errors->has('password'))
                        <div style="color:red"> {{$errors->first('password')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="passWord2" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input data-parsley-equalto="#pass1" name="repassword" type="password" value="{{old('repassword')}}"  class="form-control" id="passWord2" />
                        @if($errors->has('repassword'))
                        <div style="color:red"> {{$errors->first('repassword')}}</div>
                        @endif
                        <h5 style="color: red">{{session('msgg')}}</h5>
                    </div>
                   </div>




                   <div class="text-end">
                       <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                       <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
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
@endsection
