@extends('admin.master')

@section('title', $web_info->ad_acc)
@section('main')
	
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $web_info->ad_acc }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home }}</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('admin/account') }}">{{ $web_info->ad_acc }}</a></li>
              <li class="breadcrumb-item active">{{ $web_info->ad_acc_add }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 col-sm-9">
			      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ isset($item)? $web_info->ad_acc_edit : $web_info->ad_acc_add }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" method="post" enctype="multipart/form-data" action="{{isset($item)?  asset('admin/account/edit/'.$item->id) : asset('admin/account/add')}}">
                <div class="card-body">
                	<div class="form-group">
	                    <label for="exampleInputEmail1">{{ $web_info->ad_acc_username }}</label>
	                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{isset($item)? $item->username : ''}}" required>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">{{ $web_info->ad_acc_fullname }}</label>
	                    <input type="fullname" class="form-control" placeholder="Fullname" name="fullname" value="{{isset($item)? $item->fullname : ''}}">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">{{ $web_info->ad_acc_email }}</label>
	                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{isset($item)? $item->email : ''}}"> 
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">{{ $web_info->ad_acc_password }}</label>
	                    <input type="password" class="form-control" placeholder="Password" name="password">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">{{ $web_info->ad_acc_phone }}</label>
	                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="phone" value="{{isset($item)? $item->phone : ''}}" >
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputFile">{{ $web_info->ad_acc_image }}</label>
                      <div>
                        <input id="img" type="file" name="img" class="cssInput" onchange="changeImg(this)" style="display: none!important;">
                        <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail imageForm" src="{{ isset($item->img) && file_exists(storage_path('app/avatar/'.$item->img)) && $item->img ? asset('local/storage/app/avatar/resized-'.$item->img) : 'images/default-image.png' }}">
                      </div>
      		            
	                </div>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="{{ isset($item)? $web_info->ad_acc_edit : $web_info->ad_acc_add }}">
                  {{csrf_field()}}
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@stop
@section('script')
{{-- <script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script> --}}
@stop
