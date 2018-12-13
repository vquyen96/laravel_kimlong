@extends('client.master')

@section('title', 'Công ty cổ phần Quốc Tế Kim Long')
@section('fb_title', $web_info->footer_left)
@section('fb_des', $web_info->footer_mid1)
@section('fb_img', '')
@section('main')

    <style>
        img.media-object {
            width: 90px;
            height: 80px;
        }
        .et-thumb img.img-responsive.img-fluid {
            width: 85px;
            height: 85px;
        }
        label.error {
            font-size: 12px;
            color: #ea4335;
            font-style: initial;
            font-weight: 400;
        }
        #myModal img{
            width: 300px;
        }
        button.modal-btn {
            /* width: 100px; */
            margin: auto;
            display: block;
            background: #8b0202;
            border: 0;
            border-radius: 5px;
            color: #fff;
            padding: 10px 50px;
        }
    </style>
    <div class="et-pagetitled" style="background-image: url('{{ asset('local/storage/app/banner/resized-'.$banner->img) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <div class="et-pgttl">{{ $breadcrumb[count($breadcrumb)-1]->title }}</div>
                    <div class="et-pgsbttl">{{ count($breadcrumb) > 1 ? $breadcrumb[count($breadcrumb)-2]->title : ''}}</div>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline">
                        <li class="et-lione"><a href="{{ asset('/') }}">{{ $lang == 'vn' ? 'Trang chủ ' : '家 ' }}</a></li>
                        @foreach($breadcrumb as $item)
                            / <li class="et-litwo"><a href="{{ asset('group/'.$item->slug.'--n-'.$item->id) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="et-contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-uppercase">{{ $lang == 'vn' ? 'Liên hệ với chúng tôi' : '聯繫我們' }}</h3>
                    <p>{{ $lang == 'vn' ? 'Điền đầy dủ thông tin dưới đây để chúng tôi có thể liện hệ lại với bạn trong thời gian sớm nhất !' : '填寫下面的表格，以便我們盡快回复您！' }}Đ</p>
                    <form id="contact_form" name="contact_form" class="contact-form" action="{{ asset('contact') }}" method="post" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" class="form-control " placeholder="{{ $lang == 'vn' ? 'Họ và tên' : '姓名' }}" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input  name="email" class="form-control " placeholder="{{ $lang == 'vn' ? 'Địa chỉ Email ' : '電郵地址' }}" required type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input  name="phone" class="form-control  " placeholder="{{ $lang == 'vn' ? 'Số điện thoại' : '電話號碼' }}" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="subject" class="form-control " placeholder="{{ $lang == 'vn' ? 'Chủ đề' : '學科' }}" required type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea  name="content" class="form-control " rows="4" placeholder="{{ $lang == 'vn' ? 'Nội dung' : '內容' }}" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-lg btn-block et-button-styledark" data-loading-text="Getting Few Sec...">{{ $lang == 'vn' ? 'Gửi tin nhắn' : '發送信息' }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <!-- separator: Google Map -->
                    <div id="map-canvas" class="et-map" style="height: 385px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="et-contact-inlocat">
                        <span class="text-thm pe-7s-world"></span>
                        <h3 class="text-uppercase">location</h3>
                        <p>{{ $web_info->location_head }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="et-contact-inlocat">
                        <span class="text-thm pe-7s-headphones"></span>
                        <h3 class="text-uppercase">call now</h3>
                        <p>Any time. We are open 24/7 <br>{{ $web_info->hotline }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                    <div class="et-contact-inlocat">
                        <span class="text-thm pe-7s-mail"></span>
                        <h3 class="text-uppercase">mail us</h3>
                        <p>get support via email <br> {{ $web_info->email1 }} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img class="modal-img" src="images/home/logokimlong.png">
                    <h2 class="zz-heading-2 grey">CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG</h2>
                    <p class="modal-p">Chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất.</p>
                    <button class="modal-btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    @if( Session::has('success') )
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
        </script>
    @endif
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyABqK-5ngi3F1hrEsk7-mCcBPsjHM5_Gj0"></script>
    <script src="js/jquery.googlemap.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            var map = [{{ $web_info->mapx }} ,{{ $web_info->mapy }}];
            $("#map-canvas").googleMap({
                zoom:14, // Initial zoom level (optional)
                coords: map, // Map center (optional)
                type: "ROADMAP", // Map type (optional)
                address: "Canal Saint-Martin, Paris, France", // Postale Address
                infoWindow: {
                    content: '<p style="text-align:center;"><strong>Canal Saint-Martin,</strong><br> Paris, France</p>'
                }
            });
            // Marker 2
            $("#map-canvas").addMarker({
                coords: map
            });
        });
    </script>
    <script>
        validation_exam();
        function validation_exam(){
            $("#contact_form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "name": {
                        required: true
                    },
                    "email": {
                        required: true,
                        email: true
                    },
                    "phone": {
                        required: true,
                        phone: true
                    },
                    "subject": {
                        required: true
                    },
                    "content": {
                        required: true
                    }
                },
                messages: {
                    "name": {
                        required: "{{ $lang == 'vn' ? 'Bắt buộc nhập tên của bạn' : '強制輸入你的名字' }}"
                    },
                    "email": {
                        required: "{{ $lang == 'vn' ? 'Bắt buộc phải điền email của bạn' : '需要完成您的電子郵件' }}",
                        email: "{{ $lang == 'vn' ? 'Email của bạn không đúng định dạng' : '您的電子郵件格式不正確' }}"
                    },
                    "phone": {
                        required: "{{ $lang == 'vn' ? 'Bắt buộc phải điền số điện thoại' : '所需的電話號碼' }}",
                        phone: "Số điện thoại của bạn không hợp lệ",
                    },
                    "subject": {
                        required: "{{ $lang == 'vn' ? 'Bạn phải điền chủ đề muốn đề cập đến' : '您必須輸入要提及的主題' }}",
                    },
                    "content": {
                        required: "{{ $lang == 'vn' ? 'Bạn phải điền nội dung muốn gửi' : '您必須輸入要發送的內容' }}",
                    },
                }
            });
        }
    </script>
@stop