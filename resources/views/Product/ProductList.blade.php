@extends('./layout_master')
{{-- section id is yeild name  --}}
@section('admin')
@php
$user =Auth::user()
@endphp
<div class="content-page center">
   <div class="content">
       <!-- Start Content-->
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="header-title">Product List</h4>
                           <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                               <thead>
                                   <tr>
                                       <th>Product image</th>
                                       <th>Product Name</th>
                                       <th>Squ code</th>
                                       <th>Product Price </th>
                                       <th>Product Count</th>
                                       @if ( $user->can('product.update') && $user->can('product.update'))
                                       <th>Action</th>
                                       @endif
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($products as $product)
                                   <tr>
                                       <td>
                                        <img src="{{('/products/'.$product->product_image)}}"  alt="" class="img-thumbnail " height="90" width="90">
                                             {{-- <img src="{{ asset($product->product_image) }}" alt="" class="img-thumbnail " height="90" width="90" > --}}
                                       </td>
                                       <td>{{ $product->name }}</td>
                                       <td>{{ $product->squ_code }}</td>
                                       <td>{{ $product->price }}</td>
                                       <td>{{ $product->count }}</td>
                                       <td >
                                        @if ( $user->can('product.update') && $user->can('product.update'))
                                   <a href="/edit/product/{{$product->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                   {{-- <button class="btn btn-danger"  id="message" onclick="delete({{$product->id}})">Delete</button> --}}
                                   <a href="{{ route('delete.product',$product->id) }}" id="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                   @endif
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div> <!-- end card body-->
                   </div> <!-- end card -->
               </div><!-- end col-->
           </div>
       </div>
   </div>
</div>
@endsection
