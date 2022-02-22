<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            <li class="d-none d-lg-block">

            </li>

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>
            <li>
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{auth()->user()->notifications()->count()}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                    @foreach (auth()->user()->notifications as $noti)



                    <!-- item-->

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        {{"Stock alart for"." ".$noti->data['product']['name'], $noti->data['admin']['email']}}
                        <i class="far fa-times-circle"></i>
                    </a>
                    @endforeach

                </div>
            </li>



            <li>
                <?php
                use App\Models\Stock;
                $stocks=Stock::all()->count();

                ?>

                    <a href="{{ route('stock.list') }}"  class="nav-link dropdown-toggle waves-effect waves-light aria-haspopup="false" aria-expanded="false">
                         <i class="fe-box noti-icon"></i>
                        <span  class="badge bg-danger rounded-circle noti-icon-badge">{{$stocks}}</span>
                    </a>



            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="../assets/images/users/user-1.jpg" alt="" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <div class="dropdown-header noti-title">
                        <i class="fa fa-key"></i>
                        <a href="{{route('superadmin.admin_change_password')}}">password reset</a>
                    </div>


                    <a class="dropdown-item notify-item" href="{{ route('user.login') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="fe-lock"></i>
                     {{ __('Logout') }}
                 </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </a>




                    <div class="dropdown-divider"></div>


                </div>
            </li>



        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/home" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="../assets/images/logo-sm.png" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="../assets/images/logo-dark.png" alt="" height="20">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>
            @php
            $demo=App\Models\Company::all();

        @endphp
        @foreach ($demo as $data)
            <a href="/home" class="logo logo-light text-center">

                <span class="logo-lg">
                    <img src="{{('/admin_img/'.$data->company_logo)}}" alt="" height="30px" width="100px" >

                </span>
            </a>
            @endforeach
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>



        </ul>
        <div class="clearfix"></div>
    </div>
</div>
