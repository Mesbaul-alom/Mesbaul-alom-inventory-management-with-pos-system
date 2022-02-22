
 @extends('./layout_master')

{{-- section id is yeild name  --}}

@section('admin')
 <div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


 <div class="row">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Update Product</h3>

                <form method="POST" action= "{{url('/update/product/'.$product->id)}}"   class="parsley-examples" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product Code<span class="text-danger">*</span></label>
                        <input type="text" name="product_code" value="{{$product->product_code}}" parsley-trigger="change" required placeholder="Enter product code" class="form-control" id="product_code" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{$product->name}}" parsley-trigger="change" required placeholder="Enter name" class="form-control" id="name" />
                    </div>
                    <div class="mb-3">
                        <label for="squ_code" class="form-label">Squ code<span class="text-danger">*</span></label>
                        <input type="text" name="squ_code" value="{{$product->squ_code}}" parsley-trigger="change" required placeholder="Enter squ_code" class="form-control" id="squ_code" />
                    </div>
                    <div class="mb-3">
                        <label for="product_image" class="form-label"> Product Image<span class="text-danger">*</span></label>
                        <input type="file" name="image" value="{{$product->image}}" parsley-trigger="change"  placeholder="Upload product_image" class="form-control" id="product_image" />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price<span class="text-danger">*</span></label>
                        <input type="text" name="price" value="{{$product->price}}" parsley-trigger="change" required placeholder="Enter  price" class="form-control" id="price" />
                    </div>
                    <div class="mb-3">
                        <label for="count" class="form-label">Product Count<span class="text-danger">*</span></label>
                        <input type="text" name="count"  value="{{$product->count}}" parsley-trigger="change" required placeholder="Enter product_code" class="form-control" id="count" />
                    </div>
                    <div class="mb-3">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                         <select name="category_id" class="form-control"  >

                    <option value="{{$product->category->id}}" selected>{{$product->category->category_name}}</option>


                     @foreach($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                             @endforeach
                         </select>
                          @error('category_id')
                             <span class="text-danger">{{ $message }}</span>
                     @enderror
                     </div>
                </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Product Update</button>
                        <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
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
@endsection
