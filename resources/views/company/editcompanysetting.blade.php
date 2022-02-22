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
                <h3 class="header-title text-center">Company Info</h3>
                <div class="p-4 mr-3" style="text-align: right">
                    <a href="{{ route('company.setting') }}"><button class="btn btn-primary waves-effect waves-light">Back</button></a>
                </div>
                @foreach ($company as $data)
                <form method="POST" action="{{url('/company/profile/edit/'.$data->id)}}"  class="parsley-examples" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company  Name<span class="text-danger">*</span></label>
                        <input type="text" name="company_name" value="{{$data->company_name}}" parsley-trigger="change" class="form-control"  value="{{old('company_name')}}" id="company_name" />
                        @if($errors->has('company_name'))
                        <div style="color:red"> {{$errors->first('company_name')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="company_phone" value="{{$data->company_phone}}" parsley-trigger="change" value="{{old('company_phone')}}"  class="form-control" id="company_phone" />
                        @if($errors->has('company_phone'))
                        <div style="color:red"> {{$errors->first('company_phone')}}</div>
                        @endif
                    </div>
                    </div>
                     <div class="col-lg-6" >
                    <div class="mb-3">
                        <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="image" parsley-trigger="change" value="{{old('image')}}"  class="form-control" id="image" />
                        @if($errors->has('image'))
                        <div style="color:red"> {{$errors->first('image')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="company_address " class="form-label">Address<span class="text-danger">*</span></label>
                        <input id="company_address" value="{{$data->company_address}}"  name="company_address" type="text" placeholder="company_address" value="{{old('company_address')}}"  class="form-control" />
                        @if($errors->has('company_address   '))
                        <div style="color:red"> {{$errors->first('company_address')}}</div>
                        @endif
                    </div>
                    </div>
                    <div class="text-center p-4 mr-3">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                    </div>
                </form>
                @endforeach
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
