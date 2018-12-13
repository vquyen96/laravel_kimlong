@extends('admin.master')

@section('title', 'Hồ sơ')
@section('main')
	
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $lang == "vn" ? 'Hồ sơ cá nhân' : '輪廓' }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $lang == "vn" ? 'Trang chủ' : '家' }}</a></li>
            <li class="breadcrumb-item active">{{ $lang == "vn" ? 'Hồ sơ cá nhân' : '輪廓' }}</li>
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
              </div>

              <h3 class="profile-username text-center">{{$item->fullname}}</h3>

              <p class="text-muted text-center">{{level_format($item->level)}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>{{ $lang == 'vn' ? 'Tên đăng nhập' : '用戶名'}}</b> <a class="float-right">{{$item->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{$item->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ $lang == 'vn' ? 'Điện thoại' : '電話'}}</b> <a class="float-right">{{$item->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ $lang == 'vn' ? 'Ngày tạo' : '創作日期'}}</b> <a class="float-right">{{date_format($item->created_at,"h:m d-m-Y")}}</a>
                </li>
              </ul>

              <a href="{{ asset('admin/profile') }}" class="btn btn-danger btn-block"><b>{{ $lang == 'vn' ? 'Thay đổi thông tin' : '更改信息'}}</b></a>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">{{ $lang == 'vn' ? 'Chỉnh sửa hồ sơ' : '編輯檔案'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                    <label>{{ $lang == 'vn' ? 'Mật khẩu cũ' : '舊密碼'}}</label>
                    <input type="password" class="form-control" placeholder="{{ $lang == 'vn' ? 'Mật khẩu cũ' : '舊密碼'}}" name="old_password">
                </div>
                <div class="form-group">
                    <label>{{ $lang == 'vn' ? 'Mật khẩu mới' : '新密碼'}}</label>
                    <input type="password" class="form-control" placeholder="{{ $lang == 'vn' ? 'Mật khẩu mới' : '新密碼'}}" name="new_password">
                </div>
                <div class="form-group">
                    <label>{{ $lang == 'vn' ? 'Xác nhận lại mật khẩu' : '確認密碼'}}</label>
                    <input type="password" class="form-control" placeholder="{{ $lang == 'vn' ? 'Xác nhận lại mật khẩu' : '確認密碼'}}" name="re_new_password">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="{{ $lang == "vn" ? "Thay đổi" : "變化" }}">
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
