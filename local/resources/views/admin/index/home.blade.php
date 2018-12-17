@extends('admin.master')
@section('title', 'Quản trị')
@section('main')



	<!-- Content Wrapper. Contains page content -->
  {{--<div class="content-wrapper">--}}
    {{--<!-- Content Header (Page header) -->--}}
    {{--<div class="content-header">--}}
      {{--<div class="container-fluid">--}}
        {{--<div class="row mb-2">--}}
          {{--<div class="col-sm-6">--}}
            {{--<h1 class="m-0 text-dark">Dashboard</h1>--}}
          {{--</div><!-- /.col -->--}}
          {{--<div class="col-sm-6">--}}
            {{--<ol class="breadcrumb float-sm-right">--}}
              {{--<li class="breadcrumb-item"><a href="{{ asset('admin') }}">Home</a></li>--}}
              {{--<li class="breadcrumb-item active">Dashboard</li>--}}
            {{--</ol>--}}
          {{--</div><!-- /.col -->--}}
        {{--</div><!-- /.row -->--}}
      {{--</div><!-- /.container-fluid -->--}}
    {{--</div>--}}
    {{--<!-- /.content-header -->--}}

    {{--<!-- Main content -->--}}
    {{--<section class="content">--}}
      {{--<div class="container-fluid">--}}
        {{--<!-- Info boxes -->--}}
        {{--<div class="row form-group">--}}
          {{--<div class="col-md-6 input-group">--}}
            {{--<form id="filter_form" action="{{route('admin')}}" method="get">--}}
              {{--<div class="d-flex flex-row align-items-center">--}}
                {{--<div><b>Thời gian thống kê: {{$from}} <span class="text-warning">đến</span> {{$to}}</b></div>--}}
                {{--<div class="ml-3">--}}
                  {{--<button type="button" class="btn btn-default pull-right"--}}
                          {{--id="daterange-btn"><span><i class="fa fa-calendar"></i></span>--}}
                  {{--</button>--}}
                  {{--<input id="from" name="from" class="d-none">--}}
                  {{--<input id="to" name="to" class="d-none">--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--<button type="submit" class="d-none"></button>--}}
            {{--</form>--}}

          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
          {{--<div class="col-12 col-sm-6 col-md-3">--}}
            {{--<div class="info-box">--}}
              {{--<span class="info-box-icon bg-info elevation-1"><i class="fa fa-user"></i></span>--}}

              {{--<div class="info-box-content">--}}
                {{--<span class="info-box-text">Tổng số user</span>--}}
                {{--<span class="info-box-number">--}}
                  {{--{{(isset($data_google['user']) && isset($data_google['user']['New Visitor'][0]) && isset($data_google['user']['Returning Visitor'][0])) ? number_format($data_google['user']['New Visitor'][0] + $data_google['user']['Returning Visitor'][0]) : ''}}--}}
                {{--</span>--}}
              {{--</div>--}}
              {{--<!-- /.info-box-content -->--}}
            {{--</div>--}}
            {{--<!-- /.info-box -->--}}
          {{--</div>--}}

          {{--<div class="col-12 col-sm-6 col-md-3">--}}
            {{--<div class="info-box">--}}
              {{--<span class="info-box-icon bg-success elevation-1"><i class="fa fa-user"></i></span>--}}

              {{--<div class="info-box-content">--}}
                {{--<span class="info-box-text">Số user mới</span>--}}
                {{--<span class="info-box-number">--}}
                  {{--{{(isset($data_google['user']) && isset($data_google['user']['New Visitor'][0])) ? number_format($data_google['user']['New Visitor'][0]) : ''}}--}}
                {{--</span>--}}
              {{--</div>--}}
              {{--<!-- /.info-box-content -->--}}
            {{--</div>--}}
            {{--<!-- /.info-box -->--}}
          {{--</div>--}}
          {{--<!-- /.col -->--}}
          {{--<div class="col-12 col-sm-6 col-md-3">--}}
            {{--<div class="info-box mb-3">--}}
              {{--<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user"></i></span>--}}

              {{--<div class="info-box-content">--}}
                {{--<span class="info-box-text">Số user quay trở lại</span>--}}
                {{--<span class="info-box-number">{{(isset($data_google['user']) && isset($data_google['user']['Returning Visitor'][0])) ? number_format($data_google['user']['Returning Visitor'][0]) : ''}}</span>--}}
              {{--</div>--}}
              {{--<!-- /.info-box-content -->--}}
            {{--</div>--}}
            {{--<!-- /.info-box -->--}}
          {{--</div>--}}
          {{--<!-- /.col -->--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        {{--<div class="row">--}}
          {{--<div class="col-md-12">--}}
            {{--<div class="card">--}}
              {{--<div class="card-header">--}}
                {{--<h5 class="card-title">Top 10 link được truy cập</h5>--}}

                {{--<div class="card-tools">--}}
                  {{--<button type="button" class="btn btn-tool" data-widget="collapse">--}}
                    {{--<i class="fa fa-minus"></i>--}}
                  {{--</button>--}}
                  {{--<button type="button" class="btn btn-tool" data-widget="remove">--}}
                    {{--<i class="fa fa-times"></i>--}}
                  {{--</button>--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--<!-- /.card-header -->--}}
              {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                  {{--<!-- /.col -->--}}
                  {{--<div class="col-md-12">--}}
                  {{--@if($data_google['page'] != null && $data_google['user'] != null)--}}
                    {{--@foreach(array_splice($data_google['page'],0,10) as $key => $value)--}}
                      {{--<div class="progress-group">--}}
                        {{--{{$key}}--}}
                        {{--<span class="float-right">{{$value[0]}}<b> / {{$value[1]}}s</b></span>--}}
                        {{--<hr>--}}
                        {{--<div class="progress progress-sm">--}}
                          {{--<div class="progress-bar bg-primary" style="width: 80%"></div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--@endforeach--}}
                  {{--@endif--}}
                  {{--</div>--}}
                  {{--<!-- /.col -->--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}
              {{--</div>--}}
              {{--<!-- ./card-body -->--}}
              {{--<!-- /.card-footer -->--}}
            {{--</div>--}}
            {{--<!-- /.card -->--}}
          {{--</div>--}}
          {{--<!-- /.col -->--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}
        {{--<!-- /.row -->--}}
      {{--</div><!--/. container-fluid -->--}}
    {{--</section>--}}
    {{--<!-- /.content -->--}}
  {{--</div>--}}
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

@stop

@section('script')

<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

@stop
