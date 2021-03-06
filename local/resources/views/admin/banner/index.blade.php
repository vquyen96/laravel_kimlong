@extends('admin.master')

@section('title', $web_info->ad_banner)
@section('main')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $web_info->ad_banner }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home }}</a></li>
                            <li class="breadcrumb-item active">{{ $web_info->ad_banner }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                @foreach($banners as $banner)
                <form  method="post" enctype="multipart/form-data" action="{{ asset('admin/banner/edit/'.$banner->id) }}" class="form_edit_banner">
                    {{ csrf_field() }}
                <div class="row d-flex">
                    <div class="col-md-6">
                        <!-- Profile Image -->
                        <div class="card card-danger card-outline">
                            <div class="card-body box-profile">
                                <div class="form-group">
                                    <input type="file" class="file" name="img" style="display:{{ $banner->banner_video == "on" ? 'block' : 'none' }}"  onchange="changeImg(this)">
                                    <img class="add-image" src="{{ file_exists(storage_path('app/banner/'.$banner->img)) ? asset('local/storage/app/banner/'.$banner->img) : 'images/default-image.png' }}" width="100%">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">

                        <!-- Profile Image -->
                        <div class="card card-danger card-outline">
                            <div class="card-body box-profile">
                                <div class="form-group">
                                    <label class="bold">{{ $web_info->ad_banner_title1 }}</label>
                                    <input required="" type="text" class="form-control"  placeholder="" name="text1" value="{{$banner->text1}}">
                                </div>
                                <div class="form-group">
                                    <label class="bold">{{ $web_info->ad_banner_title2 }}</label>
                                    <input type="text" class="form-control"  placeholder="" name="text2" value="{{$banner->text2}}">
                                </div>

                                <div class="form-group">
                                    <label class="bold">{{ $web_info->ad_banner_location }}</label>
                                    <select class="form-control" name="group_id">
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}" {{ $banner->group_id == $group->id ? "selected" : "" }}>{{ $group->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ $web_info->ad_banner_save }}</button>
                                    <a href="{{ asset('admin/banner/delete/'.$banner->banner_id) }}" class="btn btn-danger white">{{ $web_info->ad_banner_del }}</a>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                </form>
                @endforeach

                <form  method="post" enctype="multipart/form-data" action="{{ asset('admin/banner/add') }}" class="form_add_banner">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <div class="btn btn-success btnAddBanner">
                                    {{ $web_info->ad_banner_add }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-6">
                            <!-- Profile Image -->
                            <div class="card card-danger card-outline">
                                <div class="card-body box-profile">
                                    <div class="form-group">
                                        {{--<label class="bold">Banner {{($key + 1)}}</label>--}}
                                        <input type="file" class="file d-none" name="img"  onchange="changeImg(this)">
                                        <img class="add-image" src="images/default-image.png" width="100%">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">

                            <!-- Profile Image -->
                            <div class="card card-danger card-outline">
                                <div class="card-body box-profile">
                                    <div class="form-group">
                                        <label class="bold">{{ $web_info->ad_banner_title1 }}</label>
                                        <input required="" type="text" class="form-control"  placeholder="" name="text1" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="bold">{{ $web_info->ad_banner_title2 }}</label>
                                        <input type="text" class="form-control"  placeholder="" name="text2" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="bold">{{ $web_info->ad_banner_location }}</label>
                                        <select class="form-control" name="group_id">
                                                <option value="" selected disabled>{{ $web_info->ad_banner_option }}</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ $web_info->ad_banner_save }}</button>
                                        {{--<a href="{{ asset('admin/banner/delete/'.$banner->banner_id) }}" class="btn btn-danger white">Xóa</a>--}}
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </div>


@stop
@section('script')
    <script src="js/banner.js"></script>

@stop
