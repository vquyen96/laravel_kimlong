@extends('admin.master')

@section('title', $web_info->ad_profile_changepass)
@section('main')
	
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $web_info->ad_profile_changepass}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home}}</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('admin/profile') }}">{{ $web_info->ad_profile }}</a></li>
            <li class="breadcrumb-item active">{{ $web_info->ad_profile_changepass }}</li>

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-danger card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <div class="avatarImg100 profile-user-img" style="background: url('{{ isset($item->img) && file_exists(storage_path('app/avatar/'.$item->img)) && $item->img ? asset('local/storage/app/avatar/'.$item->img) : '../images/images.png' }}') no-repeat center /cover;"></div>
                {{-- <img class="profile-user-img img-fluid img-circle"
                     src=""
                     alt="User profile picture"> --}}
              </div>

              <h3 class="profile-username text-center">{{$item->fullname}}</h3>

              <p class="text-muted text-center">{{level_format($item->level)}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>{{ $web_info->ad_profile_username}}</b> <a class="float-right">{{$item->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ $web_info->ad_profile_email}}</b> <a class="float-right">{{$item->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ $web_info->ad_profile_phone}}</b> <a class="float-right">{{$item->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ $web_info->ad_profile_create}}</b> <a class="float-right">{{date_format($item->created_at,"h:m d-m-Y")}}</a>
                </li>
              </ul>

              <a href="{{ asset('admin/profile') }}" class="btn btn-danger btn-block"><b>{{ $web_info->ad_profile_detail}}</b></a>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">{{ $web_info->ad_profile_changepass}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                    <label>{{ $web_info->ad_profile_pass1}}</label>
                    <input type="password" class="form-control" placeholder="" name="old_password">
                </div>
                <div class="form-group">
                    <label>{{ $web_info->ad_profile_pass2}}</label>
                    <input type="password" class="form-control" placeholder="" name="new_password">
                </div>
                <div class="form-group">
                    <label>{{ $web_info->ad_profile_pass3}}</label>
                    <input type="password" class="form-control" placeholder="" name="re_new_password">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="{{ $web_info->ad_profile_changepass }}">
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
