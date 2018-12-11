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
    <section class="et-faq-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center et-service-sect">
                    <div class="et-services-title">
                        <p class="et-services-sub-title text-thm text-uppercase">our works</p>
                        <h1 class="text-uppercase titleCustom">Thư viện ảnh</h1>
                        <div class="et-service-icon">
                            <span class="et-title-faq"></span><img src="images/icons/faq-page.png" alt=""><span class="et-title-faq2"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="et-flickr-widget">
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-xs-3 col-sm-4 col-md-3 et-extra-spcng">
                            <div class="et-thumb">
                                <div class="img-responsive img-fluid" style="background: url('{{ asset('local/storage/app/images/resized500-'.$image->img) }}') no-repeat center /cover"></div>
                                <div class="et-flckr-overlay">
                                    <i class="fa fa-search"></i>
                                    <span class="d-none">{{ asset('local/storage/app/images/'.$image->img) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ $images->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop