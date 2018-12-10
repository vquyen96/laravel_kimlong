<link rel="stylesheet" type="text/css" href="css/aside.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{-- <a href="index3.html" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">AdminLTE 3</span>
</a> --}}

<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatarImgSidebar" style="background: url('{{ file_exists(storage_path('app/avatar/'.Auth::user()->img)) && Auth::user()->img ? asset('local/storage/app/avatar/resized-'.Auth::user()->img) : '../images/images.png' }}') no-repeat center /cover;">

                </div>

            </div>
            <div class="info">
                <a href="{{ asset('admin') }}" class="d-block">{{Auth::user()->fullname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link @if (Request::segment(2) == '') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Home' : 'Dashboard'}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}"
                       class="nav-link @if (Request::segment(2) == 'account') active @endif">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Quản lí tài khoản' : 'Account management'}}
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/account') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Danh sách tài khoản' : 'Account list'}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/account/add') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Thêm mới' : 'Add new'}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}" class="nav-link @if (Request::segment(2) == 'profile') active @endif">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>
                        {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Cá Nhân' : 'Profile'}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Thông tin cá nhân' : 'Change information'}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile/change_pass') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Đổi mật khẩu' : 'Change Password'}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link  @if (Request::segment(2) == 'group') active @endif" >
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Danh mục' : 'Category'}}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->site == 1)
                            <li class="nav-item">
                                <a href="{{route('form_sort_group','00')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Sắp xếp trang chủ' : 'Sort Categories'}}</p>
                                </a>
                            </li>
                        @endif

                        {{--@if (Auth::user()->site == 1)--}}
                        {{--<li class="nav-item">--}}
                        {{--<a href="{{route('form_sort_group_category','00')}}" class="nav-link">--}}
                        {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                        {{--<p>Sắp xếp danh mục</p>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--@endif--}}

                        <li class="nav-item">
                            <a href="{{route('admin_group')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Danh sách mục' : 'Categories list'}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link  @if (Request::segment(2) == 'articel') active @endif">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Quản trị tin' : 'Article management'}}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin_articel')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Danh sách bài viết' : 'Article list'}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('form_articel',0)}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Viết bài' : 'Add new'}}</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{route('draft_article')}}" class="nav-link">--}}
                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                {{--<p>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Bài viết nháp' : 'Draft article'}}</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/website_info') }}" class="nav-link @if (Request::segment(2) == 'website_info') active @endif">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Thông tin website' : 'Website information '}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Đăng xuất' : 'Logout '}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>