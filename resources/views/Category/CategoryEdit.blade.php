
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
               <h3 class="header-title">Update Category</h3>

               <form action="{{url('/update/category/'.$category->id)}}" method="POST" class="parsley-examples">
               @csrf
                   <div class="mb-3">
                       <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
                       <input type="text" name="category_name" value="{{$category->category_name}}" parsley-trigger="change" required placeholder="Enter Category name" class="form-control" id="category_name" />
                   </div>
                   <div class="text-end">
                       <button class="btn btn-primary waves-effect waves-light" type="submit">CategoryUpdate</button>
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
   </div>
</div>
@endsection
