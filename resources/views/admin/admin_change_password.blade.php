
 @extends('./layout_master')

{{-- section id is yeild name  --}}

@section('admin')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


 <div class="row">
    <div class="col-lg-6">
    
   
                <!-- Basic Forms -->
    <div class="card">
            <div class="card-body">
                <h3 class="header-title">Add Admin</h3>
                           <form novalidate="" method="POST" action="{{ route('update.change.password')}}" >
                            @csrf
 
                             <div class="row">
                               <div class="col-12">	
 
                                   <div class="form-group">
                                       <h5>Current Password <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                       <input type="password" id="current_password" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        </div>
                                       </div>
                                </div>
 
                                   <div class="col-6">
                                   <div class="form-group">
                                       <h5>New  Password <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                       <input type="password"  id="password" name="password" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        </div>
                                       </div>
                                       </div>   {{-- row end --}}
 
                                       <div class="col-6">
                                       <div class="form-group">
                                       <h5> Confirm Password <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                       <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        </div>
                                       </div>
 
                                   </div>   {{-- row end --}}
                                 
                              
          
                               
                                   <div class="text-xs-right mt-4">
                                   <button type="submit" class="btn btn-rounded btn-info" >Update Password</button>
                               </div>
                           </form>
                        </div>

                </div>
    </div>


        </div>
    </div>
        </div>
            </div>
    </div>

       



  @endsection


  


