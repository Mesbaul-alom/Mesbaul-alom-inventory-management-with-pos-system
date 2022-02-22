
 @extends('./layout_master')

{{-- section id is yeild name  --}}

@section('admin')

<div class="content-page center">
   <div class="content">

       <!-- Start Content-->
       <div class="container">
           <div class="row">
            <div class="col-md-3">
            </div>
               <div class="col-md-6">
                   <div class="card">
                       <div class="card-body">
                           <h4 class="header-title">Category List</h4>
                           <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 ">
                               <thead>
                                     <tr>
                                       <th>Category name</th>
                                       <th class="text-end">Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach($categories  as $cat)
                                    <tr>
                                       <td>{{$cat->category_name}}</td>
                                       <td class="text-end">
                                   <a href="/edit/category/{{$cat->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                   <a href="/delete/category/{{$cat->id}}" id="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>

                       </div> <!-- end card body-->
                   </div> <!-- end card -->
               </div><!-- end col-->
               <div class="col-md-3"></div>
           </div>
       </div>
   </div>
</div>
@endsection
