@extends('admin.master')
@section('title', $web_info->ad_cate)
@section('main')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 ">{{ $web_info->ad_cate_list}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home}}</a></li>
                            <li class="breadcrumb-item active">{{ $web_info->ad_cate_list}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('error'))
                            <div class="alert alert-error">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif

                        <div class="card-header">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    @if (Auth::user()->site == 1)
                                        <a href="{{route('form_group',0)}}" class="btn btn-primary"><h3 class="card-title">{{ $web_info->ad_cate_add }}</h3></a>
                                    @endif
                                </div>
                                
                                <div class="col-md-8">
                                    <form action="{{route('admin_group')}}" method="get">
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <input value="{{isset($paramater['key_search']) ? $paramater['key_search'] : ''}}" class="form-control" name="key_search" placeholder="{{ $web_info->ad_cate_search1 }}">
                                            </div>
                                            <div class="col-md-4">
                                                <select class="select2"
                                                        name="groupid"
                                                        style="width: 100%;">
                                                    <option value="null" selected disabled>{{ $web_info->ad_cate_search2 }}</option>
                                                    @foreach($groups as $group)
                                                        <option {{$parentid == $group->id ? 'selected' : ''}}
                                                                value="{{
                                                        $group->id }}">{{
                                                        $group->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <button style="height: 90%" type="submit" class="btn btn-primary">{{ $web_info->ad_cate_search3 }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th class="hideResponsive768">Mô tả danh mục</th>
                                    <th class="hideResponsive768">Đường dẫn</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($list_group) }} --}}
                                @foreach($list_group as $group)
                                    <tr>
                                        <td>{{$group->id}}</td>
                                        <td>{{$group->title}}</td>
                                        <td class="hideResponsive768">{{$group->summary}}</td>
                                        <td class="hideResponsive768">{{$group->slug}}</td>
                                        <td>{{$group->created_at}}</td>
                                        
                                        <td>
                                            <button class="btn btn-block btn-sm {{ $group->status == 0 ? 'btn-danger btnOn' : 'btn-success btnOff' }}">{{ $group->status ? ' Hoạt động' : 'Không hoạt động' }}</button>
                                            <div class="id_group" style="display: none;">{{$group->id}}</div>
                                        </td>
                                        <td>
                                            <div class="row form-group">
                                                <a href="{{route('form_group',$group->id)}}" data-toggle="tooltip" title="Chỉnh sửa" class="col-sm-6 text-primary"><i class="fa fa-wrench"></i></a>
                                                <a data-toggle="tooltip" title="Xóa" href="{{route('delete_group',['id' =>$group->id,'group_id'=>isset($parentid) ? $parentid : 0])}}" class="col-sm-6 text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa')" @if ($group->status != 0 ) style="display: none" @endif><i class="fa fa-trash"></i></a>
                                                <a data-toggle="tooltip" title="Xem chi tiết" href="{{ route('detail_group', ['id' => $group->id]) }}" class="col-sm-6 text-dark"  @if ($group->status != 1 || $group->single != 1 || $group->link != null) style="display: none" @endif><i class="fas fa-info-circle"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row form-group pull-right" style="margin: 10px 0px">
                                {!! $list_group->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@stop

@section('css')
@stop


@section('script')
<script type="text/javascript" src="js/group.js"></script>
@stop