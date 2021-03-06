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
                            {{ $web_info->ad_dashbroad}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}"
                       class="nav-link @if (Request::segment(2) == 'account') active @endif">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>
                             {{ $web_info->ad_acc}}
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/account') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_acc_list}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/account/add') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_acc_add}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}" class="nav-link @if (Request::segment(2) == 'profile') active @endif">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>
                        {{ $web_info->ad_profile}}
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_profile_detail}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile/change_pass') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_profile_changepass}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/banner') }}" class="nav-link @if (Request::segment(2) == 'banner') active @endif">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            {{ $web_info->ad_banner }}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/image') }}" class="nav-link @if (Request::segment(2) == 'image') active @endif">
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            {{ $web_info->ad_image }}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link  @if (Request::segment(2) == 'group') active @endif" >
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            {{ $web_info->ad_cate }}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->site == 1)
                            <li class="nav-item">
                                <a href="{{route('form_sort_group','00')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ $web_info->ad_cate_sort }}</p>
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
                                <p>{{ $web_info->ad_cate_list }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link  @if (Request::segment(2) == 'articel') active @endif">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            {{ $web_info->ad_news}}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin_articel')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_news_list}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('form_articel',0)}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{ $web_info->ad_news_add}}</p>
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
                    <a href="{{ asset('admin/recruitment') }}" class="nav-link @if (Request::segment(2) == 'recruitment') active @endif">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            {{ $web_info->ad_recruit}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/contact') }}" class="nav-link @if (Request::segment(2) == 'contact') active @endif">
                        <i class="nav-icon fab fa-discourse"></i>
                        <p>
                            {{ $web_info->ad_contact}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/website_info') }}" class="nav-link @if (Request::segment(2) == 'website_info') active @endif">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            {{ $web_info->ad_info}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{ $web_info->ad_logout}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>