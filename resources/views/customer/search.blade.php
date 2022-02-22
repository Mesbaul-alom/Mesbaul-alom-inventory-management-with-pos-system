@extends('./layout_master')
@section('admin')
<div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    @foreach ( $querysearch as $search)
                    <tr>
                        <th>{{$search->customer_name}}</th>
                        <th>address</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>city</th>
                        <th>country</th>
                        <th class="text-end">Action</th>
                    </tr>
                    @endforeach
                   
                </thead>
                <tbody>
                </tbody>
            
            </table>

        </div>
    </div>
 </div>
@endsection