@extends('admin.master')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
@stop
@section('main')
    @if (session('error'))
        <div class="alert alert-error">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{ $articel->id == 0? 'Thêm mới ': 'Chỉnh sửa '}}Bài viết</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="{{ asset('admin/articel') }}">Bài viết</a></li>
                  <li class="breadcrumb-item active">{{ $articel->id == 0? 'Thêm mới ': 'Chỉnh sửa '}}</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12 col-sm-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">{{ $articel->id == 0? 'Thêm mới ': 'Chỉnh sửa '}}</h3>
                    </div>
                    <form id="create_articel" action="{{ url('/admin/articel/action_articel') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="card-body">
                            <div class="row form-group d-none">
                                <label class="col-sm-2">ID bài viết</label>
                                <div class="col-sm-10">
                                    <input type="text" name="articel[id]" value="{{$articel->id}}" class="form-control" placeholder="ID danh mục">
                                </div>
                            </div>

                                    <div class="row form-group">
                                        <label class="col-sm-2">Tiêu đề bài viết <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="articel[title]" required value="{{$articel->title}}"
                                                   class="form-control" placeholder="Tiêu đề bài viết">
                                        </div>
                                    </div>

                                    {{-- <div class="row form-group">
                                        <label class="col-sm-2">Tiêu đề phụ</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="articel[titlephu]" value="{{$articel->titlephu}}" class="form-control" placeholder="Tiêu đề phụ">
                                        </div>
                                    </div> --}}

                                    
                                    <div class="row form-group">
                                        <label class="col-sm-2">Ngày phát hành <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="date" name="articel[release_time][day]" required
                                                   value="{{$articel->release_time->day}}" min="1000-01-01"
                                                   max="3000-12-31" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="bootstrap-timepicker">
                                                <div class="input-group">
                                                    <input type="text" name="articel[release_time][h]"
                                                           value="{{$articel->release_time->h}}" class="form-control timepicker">

                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                </div>
                                                <!-- /.form group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-2">Danh mục tin <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control choose_relate" data-placeholder="Chọn danh mục cha" name="articel[groupid]" id="group" required
                                                    style="width: 100%;">
                                                <option value="" disabled {{ Request::segment(4) == '0' ? 'selected' : '' }}>Chọn danh mục</option>
                                                @foreach($list_group as $group)
                                                    <option {{$articel->groupid == $group->id ? 'selected' : ''}} value="{{ $group->id }}">{{ $group->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--<div class="col-sm-5">--}}
                                            {{--<select class="form-control choose_relate" data-placeholder="Danh mục con" name="articel[groupid_child]" id="group_child"--}}
                                                    {{--style="width: 100%;">--}}
                                                {{--<option value="" disabled {{ Request::segment(4) == '0' || !isset($articel->groupid_child)  ? 'selected' : '' }}>Chọn danh mục con</option>--}}
                                                {{--@foreach($list_group_child as $group)--}}
                                                    {{--<option {{isset($articel->groupid_child) && $articel->groupid_child == $group->id ? 'selected' : ''}} value="{{ $group->id }}">{{ $group->title }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-2">Tóm tắt</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="articel[summary]" class="form-control" placeholder="Mô tả">{{$articel->summary}}</textarea>
                                        </div>
                                    </div>

                                    


                                    <div class="row form-group">
                                        <label class="col-sm-2">Ảnh đại diện</label>
                                        <div class="col-sm-3 form-group">
                                            <input id="img" type="file" name="img" class="cssInput" onchange="changeImg(this)" style="display: none!important;">
                                            <img style="cursor: pointer;max-width: 100%;max-height: 300px;" id="avatar" class="cssInput thumbnail imageForm" src="
                                                {{ isset($articel->fimage)  && $articel->fimage ?
                                                    (file_exists(storage_path('app/article/resized500-'.$articel->fimage)) ?
                                                        asset('local/storage/app/article/resized500-'.$articel->fimage) :
                                                        (file_exists(resource_path($articel->fimage)) ?
                                                            asset('/local/resources'.$articel->fimage) :
                                                            'images/default-image.png')) :
                                                'images/default-image.png' }}">
                                            
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-2">Nội dung bài viết</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box box-info">
                                                        <!-- /.box-header -->
                                                        <div class="box-body pad">
                                                            <textarea id="editor1" name="articel[content]" rows="10" cols="80">
                                                                {{ $articel->content != '' ? $articel->content : 'Nội dung bài viết' }}
                                                            </textarea>

                                                        </div>
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <!-- /.col-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-2">Tác giả</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="articel[tacgia]" value="{{$articel->tacgia}}">
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px">{{ $articel->id  ? 'Cập nhật' : 'Tạo mới' }}</button>


                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./row -->
    </div>
@stop

@section('script')
    <script src="plugins/ckeditor/ckeditor.js"></script>
    {{-- <script src="plugins/ckeditor/html5video.js"></script> --}}
    
    <script src="js/article.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace( 'editor1', {
                height: '400px',
                filebrowserBrowseUrl: 'plugins/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: 'plugins/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: 'plugins/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            } );


            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
        });
        $(document).ready(function(){
            if ($('input[name="articel[hot_main]"]').attr('checked')) {
                $("#hot-main").prop('disabled', false);
            }else{
                $("#hot-main").prop('disabled', true);
            }

            if ($('input[name="articel[hot_item]"]').attr('checked')) {
                $("#hot-item").prop('disabled', false);
            }else{
                $("#hot-item").prop('disabled', true);
            }


            if ($('input[name="articel[hot_tiny]"]').attr('checked')) {
                $("#hot-tiny").prop('disabled', false);
            }else{
                $("#hot-tiny").prop('disabled', true);
            }
            
            $('.btn_return').click(function(){
                $('input[name="articel[send]"]').val('1');
                $('button[type="submit"]').click();
            });
            // $("#hot-item").prop('disabled', true);
        });
            
        function hot_main(a) {
            if(a){
                // $('#hot-main').removeClass('d-none');
                $("#hot-main").prop('disabled', false);
                // document.getElementById("hot-main").disabled = false;
            }else {
                $("#hot-main").prop('disabled', true);
                // document.getElementById("hot-main").disabled = true;
                // $('#hot-main').addClass('d-none');
            }
        }

        function hot_item(a) {
            if(a){
                $('#hot-item').prop('disabled', false);
            }else {
                $('#hot-item').prop('disabled', true);
            }
        }

        function hot_tiny(a) {
            if(a){
                $('#hot-tiny').prop('disabled', false);
            }else {
                $('#hot-tiny').prop('disabled', true);
            }
        }
        // $(document).on('change', '#group', function (e) {
        //     var group_id = $(this).val();
            

        //     e.preventDefault();
        //     $.ajax({
        //         url: url+'/admin/articel/get_relate/'   ,
        //         method: 'get',
        //         dataType: 'json',
        //     }).fail(function (ui, status) {
        //         console.log('error');
        //     }).done(function (data, status) {
        //         console.log(data.content);
        //         if(data.content){
        //             console.log(data.content);
        //             setTimeout(function () {
        //                 $('#relate').html(data.content);
        //                 // $('#relate').selectpicker('refresh');
        //             },200);
        //         }
        //     })
        // });
        
        
    </script>

    <script>
        $("#create_articel").validate({
            ignore: [],
            rules: {
                'articel[title]': {
                    required: true
                    // maxlength : 80
                },
                'articel[release_time][day]': {
                    required: true
                },
                'articel[release_time][h]': {
                    required: true
                },
                'articel[groupid][]': {
                    required: true
                },
                // 'articel[summary]': {
                //     maxlength : 200
                // }
            },
            messages: {
                'articel[title]': {
                    required: 'Vui lòng nhập tên danh mục'
                    // maxlength : 'Tiều đề không được quá 80 ký tự'
                },
                'articel[release_time][day]': {
                    required: 'Thiếu ngày phát hành'
                },
                'articel[release_time][h]': {
                    required: 'Thiếu giờ phát hành'
                },
                'articel[groupid][]': {
                    required: 'Thiếu nhóm tin tức'
                },
                // 'articel[summary]': {
                //     maxlength : 'Mô tả không được quá 200 ký tự'
                // }
            }
        });
    </script>
@stop
