<link rel="stylesheet" type="text/css" href="css/header.css">
<nav class="main-header navbar navbar-expand navbar-light border-bottom bg-kimlong">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ asset('admin') }}" class="nav-link" target="blank"> {{ $web_info->ad_home }}</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <select id="lang" class="form-control" onchange="change_lang()">
                <option {{ $lang == 'vn' ? 'selected' : ''}} value="vn"> {{ $web_info->ad_vietnamese}}</option>
                <option {{\Illuminate\Support\Facades\Config::get('app.locale') == 'en' ? 'selected' : ''}} value="en"> {{ $web_info->ad_chinese}}</option>
            </select>
        </li>
    </ul>
</nav>