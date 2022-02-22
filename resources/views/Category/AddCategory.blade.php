
 @extends('./layout_master')

 {{-- section id is yeild name  --}}

 @section('admin')

 <div class="content-page center">

        <!-- Start Content-->


 <div class="row" style="padding-top: 50px">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">


        <div class="card">
            <div class="card-body">
                <h3 class="header-title  ">Add Category</h3>
                <form action="{{url('/add/category')}}" method="POST" class="parsley-examples">
                @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
                        <input type="text" name="category_name" parsley-trigger="change" value="{{old('category_name')}}"  placeholder="Enter Category name" class="form-control" id="category_name" />
                        @error('category_name')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">CategorySubmit</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                    </div>
                </form>
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-3"></div>
 </div>



 </div>
@endsection
