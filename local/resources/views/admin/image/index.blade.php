@extends('admin.master')

@section('title', $lang == "vn" ? "Thư viện ảnh" : "照片庫")
@section('main')
    <style>
        .image-item{
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 180px;
            width: 216px;
            background-color: #eee;
            margin-right: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .image-item>a{
            position: absolute;
            top: 0px;
            right: 10px;
            color: red!important;
            font-weight: bold;
            font-size: 20px;
            cursor: pointer;
        }
        .image-container{
            display: flex;
            flex-wrap: wrap;
        }

        #add-image{
            cursor: pointer;
        }
        #button{
            display: none;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $lang == "vn" ? "Thư viện ảnh" : "照片庫"}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $lang == "vn" ? "Trang chủ" : "家"}}</a></li>
                            <li class="breadcrumb-item active">{{ $lang == "vn" ? "Thư viện ảnh" : "照片庫"}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-danger card-outline">
                            <div class="card-body box-profile">
                                <div class="image-container">
                                    @foreach($images as $image)
                                        <div class="image-item" style="background-image: url({{ asset('local/storage/app/images/resized500-'.$image->img)}})"><a href="{{ asset('admin/image/delete/'.$image->id) }}">x</a></div>
                                    @endforeach

                                    <div class="image-item add-image"  style="background-image: url(images/add-icon.png)"></div>
                                    <form method="post" enctype="multipart/form-data" action="{{ asset('admin/image/add') }}">
                                        <input required="" style="display: none;" id="file" type="file" name="url" onchange="changeImageImg(this)">
                                        <button type="submit" class="btn btn-primary" id="button">Save</button>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@stop
@section('script')
<script>
    var this_add_image;
    $(document).ready(function(){
        $('.add-image').click(function(){
            console.log('ok');
            this_add_image = $(this);
            this_add_image.next().find('input[type=file]').click();
            // $('#file').click();
        });
    });

    function changeImageImg(input){
        console.log('ok1');
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if(input.files && input.files[0]){
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e){
                //Thay đổi đường dẫn ảnh
                this_add_image.css('background-image','url(' + e.target.result + ')');
                console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            this_add_image.next().find('button').show();
            // $('#button').show();
        }
    }
</script>
@stop
