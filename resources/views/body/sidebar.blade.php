<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="/home">
                        <i class="fas fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @php
                    $user = Auth::user();
                @endphp
                @if ($user->can('admin.create'))
                    <li>
                        <a href="#sidebar1" data-bs-toggle="collapse">
                            <i class="fas fa-user"></i>
                            <span> Admin </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar1">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('add.admin') }}">Add Admin</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.list') }}">Admin List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{-- </ul>
            </div>
        </li> --}}
           @endif
@if($user->can('user.create'))
                <li>
                    <a href="#sidebar2" data-bs-toggle="collapse">
                        <i class="fas fa-user"></i>
                        <span> Manager </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebar2">
                        <ul class="nav-second-level">
                            <li>
                                <a
                               href="{{ route('add.manager') }}"
                                   >Add Manager</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('show.manager') }}"
                              >Manager list</a>
                            </li>
                        </ul>
                    </div>
                </li>
                    <li>
                        <a href="#sidebar" data-bs-toggle="collapse">
                            <i class="fas fa-box"></i>
                            <span> Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('add.category') }}">Add catagory </a>
                                </li>
                                <li>
                                    <a href="{{ route('category.list') }}">Category List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li>
                    <a href="#sidebar3" data-bs-toggle="collapse">
                        <i class="fas fa-box"></i>
                        <span> Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebar3">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.product') }}">Add Product</a>
                            </li>
                            <li>
                                <a href="{{ route('show.product') }}">Product List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebar4" data-bs-toggle="collapse">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span>Supplier</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebar4">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.Supplier') }}">Add Supplier</a>
                            </li>
                            <li>
                                <a href="{{ route('show.Supplier') }}">Supplier List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#purchase" data-bs-toggle="collapse">
                        <i class="fas fa-shopping-bag"></i>
                        <span> Purchase </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="purchase">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.purchase') }}"> Purchase</a>
                            </li>
                            <li>
                                <a href="{{ route('show.purchase') }}">Purchase List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#stock" data-bs-toggle="collapse">
                        <i class="fas fa-box"></i>
                        <span> Stock </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                            {{-- <li>
                                <a
                                    href="{{ route('add.purchase') }}"
                               > Stock</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('stock.list') }}">Stock List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Product return --}}
                <li>
                    <a href="#return" data-bs-toggle="collapse">
                        <i class="fas fa-undo"></i>
                        <span> Return product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="return">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('show.return.product')}}">Add Return product</a>
                            </li>
                            <li>
                                <a href="{{route('show.return.productList')}}">Return product list</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebar5" data-bs-toggle="collapse">
                        <i class="fas fa-store"></i>
                        <span>Sales</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebar5">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('/sales')}}" >Pos</a>
                            </li>
                            <li>
                                <a href="{{url('/possales')}}" >Sales List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#customer" data-bs-toggle="collapse">
                        <i class="fas fa-user"></i>
                        <span> customer </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav-second-level">
                            {{-- <li>
                                <a
                                    href="{{ route('add.purchase') }}"
                               > Stock</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('customer.list') }}" >customer List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#company" data-bs-toggle="collapse">
                        <i class="fas fa-cogs"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="company">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('company.setting') }}" >Company Profile</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#report" data-bs-toggle="collapse">
                        <i class="fas fa-file-download"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('sales.report') }}" >Sales Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
