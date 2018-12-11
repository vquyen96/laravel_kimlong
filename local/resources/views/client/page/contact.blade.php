@extends('client.master')

@section('title', 'Công ty cổ phần Quốc Tế Kim Long')
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
    </style>
    <div class="et-pagetitled" style="background-image: url('{{ asset('local/storage/app/banner/resized-'.$banner->img) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <div class="et-pgttl">Detail Sidebar Less</div>
                    <div class="et-pgsbttl">recent new & post</div>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline">
                        <li class="et-lione"><a href="{{ asset('/') }}">Trang chủ </a></li>
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
                    <h3 class="text-uppercase">Liên hệ với chúng tôi</h3>
                    <p>Điền đầy dủ thông tin dưới đây để chúng tôi có thể liện hệ lại với bạn trong thời gian sớm nhất !</p>
                    <form id="contact_form" name="contact_form" class="contact-form" action="{{ asset('contact') }}" method="post" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" class="form-control " placeholder="Họ và tên" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input  name="email" class="form-control " placeholder="địa chỉ Email " required type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input  name="phone" class="form-control  " placeholder="Số điện thoại" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="subject" class="form-control " placeholder="Chủ đề" required type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea  name="content" class="form-control " rows="4" placeholder="Nội dung" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-lg btn-block et-button-styledark" data-loading-text="Getting Few Sec...">Gửi tin nhắn</button>
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

@stop
@section('script')
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
                        required: "Bắt buộc nhập tên của bạn"
                    },
                    "email": {
                        required: "Bắt buộc phải điền email của bạn",
                        email: "Email của bạn không đúng định dạng"
                    },
                    "phone": {
                        required: "Bắt buộc phải điền số điện thoại",
                        phone: "Số điện thoại của bạn không hợp lệ",
                    },
                    "subject": {
                        required: "Bạn phải điền chủ đề muốn đề cập đến",
                    },
                    "content": {
                        required: "Bạn phải điền nội dung muốn gửi",
                    },
                }
            });
        }
    </script>
@stop