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
        .et-service-contnt h3 {
            height: 52px;
            overflow: hidden;
        }
        .et-service-contnt p {
            height: 80px;
            overflow: hidden;
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


    <section class="et-services-one">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center et-service-sect">
                    <div class="et-services-title">
                        <p class="et-services-sub-title text-thm text-uppercase">About our company</p>
                        <h1 class="text-uppercase">our best <span class="text-kl">News list</span></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit porro, blanditiis saepe tenetur dignissimos</p>
                        <!--<div class="et-service-icon">-->
                        <!--<span class="et-title-line"></span><img src="images/icons/plumber.png" alt=""><span class="et-title-line2"></span>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach( $latestpost as $news)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="et-service-column style2">
                        <div class="et-service-thumb">
                            <img class="img-responsive img-fluid" src="{{ asset('local/storage/app/article/resized500-'.$news->fimage) }}" alt="">
                        </div>
                        <div class="et-service-contnt">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ cut_string($news->summary, 200) }}</p>
                            <a class="text-thm" href="{{ asset('detail/'.$news->slug.'--n-'.$news->id) }}">read more <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
                            <div class="et-slash">//////////////////////////////////////////////////////</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@stop