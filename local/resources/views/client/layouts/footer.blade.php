<footer class="footer et-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="et-foter-title">
                    <p class="et-foter-sub-title text-uppercase text-kl">CÔNG TY CỔ PHẦN QUỐC TẾ KIM LONG</p>
                </div>
                <div class="et-twitter-feed-widget">
                    <ul>
                        <li><span class="text-thm">{{ $web_info->location1 }} </span><br>Địa chỉ: {{ $web_info->address1 }}<br>Tel: {{ $web_info->tel1 }} {{ $web_info->fax1 != null ? 'Fax: '.$web_info->fax1 : '' }}<br>{{ $web_info->email1 != null ? 'Email: '.$web_info->email1 : '' }}</li>
                        <li><span class="text-thm">{{ $web_info->location2 }} </span><br>Địa chỉ: {{ $web_info->address2 }}<br>Tel: {{ $web_info->tel2 }} {{ $web_info->fax2 != null ? 'Fax: '.$web_info->fax2 : '' }}<br>{{ $web_info->email2 != null ? 'Email: '.$web_info->email2 : '' }}</li>
                        <li><span class="text-thm">{{ $web_info->location3 }} </span><br>Địa chỉ: {{ $web_info->address3 }}<br>Tel: {{ $web_info->tel3 }} {{ $web_info->fax3 != null ? 'Fax: '.$web_info->fax3 : '' }}<br>{{ $web_info->email3 != null ? 'Email: '.$web_info->email3 : '' }}</li>
                        {{--<li><a href="#"><span class="text-thm">@market </span> Phasellus lacus nulla, tristique in nibh eget, dignissim fermentum mi. Vestibulum egestas. <span class="text-thm">about 1 min ago</span></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 text-center">
                <div class="foter-logo">
                    <img src="images/home/logokimlong.png" alt="">
                    <p> {{ $web_info->footer_mid }}</p>
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="et-foter-title">
                    <p class="et-foter-sub-title text-uppercase">Thư viện ảnh</p>
                </div>
                <div class="et-flickr-widget">
                    <div class="row">
                        @foreach($foter_images as $image)
                        <div class="col-xs-3 col-sm-4 col-md-3 et-extra-spcng">
                            <div class="et-thumb">
                                <div class="img-responsive img-fluid" style="background: url('{{ asset('local/storage/app/images/resized200-'.$image->img) }}') no-repeat center /cover"></div>
                                <div class="et-flckr-overlay">
                                    <i class="fa fa-search"></i>
                                    <span class="d-none">{{ asset('local/storage/app/images/'.$image->img) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="copyright">Copyright ©2018 <a href="" class="text-thm">Cgroupvn</a>  All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            <div class="modal-body">
                <img src="" alt="" width="100%">
            </div>
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>