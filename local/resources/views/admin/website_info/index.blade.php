@extends('admin.master')
@section('title', $web_info->ad_info)
@section('css')
@stop
@section('main')
    {{-- @if (session('error'))
        <div class="alert alert-error">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="content-wrapper">
        <div class="box-header with-border">
            <h3 class="box-title">Thông tin website </h3>
        </div>
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
        <section class="content">
            <div class="row form-group" style="padding: 10px">
                <div class="col-md-8">


 --}}

    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{ $web_info->ad_info }}</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home }}</a></li>
                  
                  <li class="breadcrumb-item active">{{ $web_info->ad_info }}</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
                <div class="col-md-8 col-sm-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{ $web_info->ad_info }}</h3>
                        </div>
                        <form id="create_group" action="{{route('update_info')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                @foreach($website_info->info as $key => $info)
                                    <div class="row form-group">
                                        <label class="col-sm-2">{{$key}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="info[{{$key}}]" value="{{$info}}" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                
                            <div class="box-footer card-footer">
                                <button type="submit" class="btn btn-info pull-right">{{ $web_info->ad_info_save }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 " style="padding-left: 30px">
                    <div class="card card-info d-none">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin gốc</h3>
                        </div>
                        <form id="create_group" action="{{route('update_info_raw')}}" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        <textarea name="info" class="form-control" rows="20">{{$info_raw}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer card-footer">
                                <button type="submit" class="btn btn-info pull-right">{{ $web_info->ad_info_save }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <label>{{ $web_info->ad_info_user }} : {{$website_info->user_updated ? $website_info->user_updated->fullname : 'admin'}}</label>
                    </div>
                    <div class="row">
                        <label>{{ $web_info->ad_info_update }} : {{$website_info->updated_at}}</label>
                    </div>
                </div>
            </div>
          </div>
            <!-- ./row -->
        </section>
        {{-- {{ time() }}
    {{ (date('d/m/Y H:m:s',time())) }} --}}
    </div>

@stop

@section('script')
@stop
