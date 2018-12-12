{{--<!DOCTYPE html>--}}
{{--<html dir="ltr" lang="en">--}}
{{--<head>--}}
	{{--<meta charset="utf-8">--}}
	{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
	{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
	{{--<link href="images/home/anh11 (1).ico" rel="shortcut icon" type="image/x-icon" />--}}
	{{--<link href="images/home/anh11 (1).ico" rel="icon" type="image/x-icon" />--}}
	{{--&lt;!&ndash; Plombiers Title &ndash;&gt;--}}
	{{--<title>Công ty CP Quốc tế kim long</title>--}}

	{{--&lt;!&ndash; css file &ndash;&gt;--}}
	{{--<link rel="stylesheet" href="css/bootstrap.min.css">--}}
	{{--<link rel="stylesheet" href="css/style.css">--}}
	{{--&lt;!&ndash; Responsive stylesheet &ndash;&gt;--}}
	{{--<link rel="stylesheet" href="css/responsive.css">--}}
	{{--<style>--}}
		{{--img.media-object {--}}
			{{--width: 90px;--}}
			{{--height: 80px;--}}
		{{--}--}}
		{{--.et-thumb img.img-responsive.img-fluid {--}}
			{{--width: 85px;--}}
			{{--height: 85px;--}}
		{{--}--}}
		{{--.foter-logo img {--}}
			{{--width: 36%;--}}
		{{--}--}}
	{{--</style>--}}
	{{--&lt;!&ndash; HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries &ndash;&gt;--}}
	{{--&lt;!&ndash; WARNING: Respond.js doesn't work if you view the page via file:// &ndash;&gt;--}}
	{{--&lt;!&ndash;[if lt IE 9]>--}}
	{{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
	{{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
	{{--<![endif]&ndash;&gt;--}}
{{--</head>--}}
{{--<body>--}}


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


	<section class="et-faq-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center et-service-sect">
					<div class="et-services-title">
						<p class="et-services-sub-title text-thm text-uppercase">our works</p>
						<h1 class="text-uppercase titleCustom">{{ $news->title }}</h1>
						<div class="et-service-icon">
						<span class="et-title-faq"></span><img src="images/icons/faq-page.png" alt=""><span class="et-title-faq2"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="et-blog-inner-search">
						<div class="input-group">
							<input placeholder="Search" class="form-control et-bisrch search-input" name="search-field" type="text">
							<span class="input-group-btn">
								<button type="button" class="btn text-thm et-search"><i class="fa fa-search"></i></button>
							</span>
						</div>
						<div class="searchValue">

						</div>
					</div>
					<div class="et-categories et-inner-box">
						<h3 class="et-popular-categori-ttl text-uppercase"><i class="pe-7s-paper-plane"></i> CATEGORIES</h3>
						<ul class="list-unstyled">
							@foreach( $gr_childs as $gr)
							<li><p><a href="{{ $gr->link == null ? asset('group/'.$gr->slug.'--n-'.$gr->id) : $gr->link }}" {{ $gr->link == null ? '' : 'target="_blank"' }} >{{ $gr->title }}</a></p></li>
							@endforeach
							{{--<li><p>Curabitur id turpis at nulla elementum egestas</p></li>--}}
							{{--<li><p>Nam ac nulla nec eros consectetur eleifend </p></li>--}}
							{{--<li><p>Morbi non ligula cursus, pellentesque tortor </p></li>--}}
							{{--<li><p>Aenean purus odio, porta sit amet accumsan </p></li>--}}
						</ul>
					</div>
					<div class="et-blog-smlastest-post et-inner-box">
						<h3 class="et-blog-smttl text-uppercase titleCustom"><i class="pe-7s-tools"></i> latest post</h3>
						@foreach($latestpost as $news)
						<div class="media">
							<div class="media-left pull-left">
								<a href="#">
									<img class="media-object" src="{{ asset('local/storage/app/article/resized200-'.$news->fimage) }}" alt="{{ $news->title }}.jpg">
								</a>
							</div>
							<div class="media-body">
								<h5 class="media-heading">{{ $news->title }}</h5>
								<h6 class="et-bsmp-ttl">May 20, 2016</h6>
								<a class="et-bsmpa" href="{{ asset('detail/'.$news->slug.'--n-'.$news->id) }}">Read More</a>
							</div>
						</div>
						@endforeach
						{{--<div class="media">--}}
							{{--<div class="media-left pull-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="images/home/dong_von_ty_tq.jpg" alt="newss2.jpg">--}}
								{{--</a>--}}
							{{--</div>--}}
							{{--<div class="media-body">--}}
								{{--<h5 class="media-heading">Nulla maximus, nisl a vehicula eleifend, nisi urna auctor est, a varius.</h5>--}}
								{{--<h6 class="et-bsmp-ttl">May 20, 2016</h6>--}}
								{{--<a class="et-bsmpa" href="#">Read More</a>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="media">--}}
							{{--<div class="media-left pull-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="images/home/hang_giam_gia_251124738.jpg" alt="newss1.jpg">--}}
								{{--</a>--}}
							{{--</div>--}}
							{{--<div class="media-body">--}}
								{{--<h5 class="media-heading">Nulla maximus, nisl a vehicula eleifend, nisi urna auctor est, a varius.</h5>--}}
								{{--<h6 class="et-bsmp-ttl">May 20, 2016</h6>--}}
								{{--<a class="et-bsmpa" href="#">Read More</a>--}}
							{{--</div>--}}
						{{--</div>--}}
					</div>
					{{--<div class="et-quote et-inner-box">--}}
						{{--<h3 class="et-quot-ttl text-uppercase titleCustom"><i class="pe-7s-comment"></i> Quote of the Day</h3>--}}
						{{--<p>In porttitor eleifend libero, vitae lobortis diam. Morbi feugiat nisl nisi, ut vehicula nulla venenatis vel. Etiam in sagittis tellus. Phasellus malesuada volutpat porttitor. Aliquam vitae magna pellentesque ex pretium posuere nec id nulla. Phasellus consequat .</p>--}}
					{{--</div>--}}
					{{--<div class="et-popular-tags et-inner-box">--}}
						{{--<h3 class="et-popular-tag-ttl text-uppercase"><i class="pe-7s-comment"></i> populer <span class="text-thm">tag</span></h3>--}}
						{{--<ul class="list-inline et-tag-list">--}}
							{{--<li><a href="#">Education</a></li>--}}
							{{--<li><a href="#">Crisis</a></li>--}}
							{{--<li><a href="#">Water</a></li>--}}
							{{--<li><a href="#">Small Business</a></li>--}}
							{{--<li><a href="#">Giving</a></li>--}}
							{{--<li><a href="#">Children</a></li>--}}
						{{--</ul>--}}
					{{--</div>--}}
				</div>
				<div class="col-md-8 et-pzero">
					<div class="et-blog-col et-blg-grid">
						{{--<div class="et-blog-thumb">--}}
							{{--<img class="img-responsive img-fluid" src="{{ asset('local/storage/app/article/resized500-'.$news->fimage) }}" alt="">--}}
							{{--<div class="et-thumb-cntnt">--}}
								{{--<ul class="list-inline">--}}
									{{--<li><a class="et-like" href="#"><i class="pe-7s-like2"></i> 265</a></li>--}}
									{{--<li><a class="et-comment" href="#"><i class="pe-7s-comment"></i> 5822</a></li>--}}
								{{--</ul>--}}
							{{--</div>--}}
						{{--</div>--}}
						<div class="et-blog-cntnt">
							{!! $content->noidung !!}
							<hr>
						</div>
					</div>
					<ul class="et-bpstcmnt list-inline">
						<li><a href="#"><span class="fa fa-user"> posted by admin </span></a></li>
						<li><a href="#"><span class="fa fa-cog"> plumber, fix, task</span></a></li>
						<li><a href="#"><span class="fa fa-commenting-o"> 4 comments</span></a></li>
					</ul>
					<div class="et-blog-innerp-fonticon">
						<div class="et-share">
							<ul class="list-inline et-inner-fi">
								<li>Share:</li>
								<li class="font-icon"><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="font-icon"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="font-icon"><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li class="font-icon"><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
@stop
@section('script')
	<script>
        var url = $('.currentUrl').text();
        $(document).on('keypress', '.search-input', function(e) {
            var search = $(this).val();
            $.ajax({
                method: 'POST',
                url: url+'search',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'search': search
                },
                success: function (resp) {
                    if(resp){
                        $('.searchValue').html(resp);
                    }
                },
                error: function () {
                    $('.searchValue').html('');
                    console.log('error');
                }
            });


        });
	</script>
@stop
{{--&lt;!&ndash; Wrapper End &ndash;&gt;--}}
{{--<script type="text/javascript" src="js/jquery.js"></script>--}}
{{--<script type="text/javascript" src="js/jquery-ui.min.js"></script>--}}
{{--<script type="text/javascript" src="js/bootstrap.min.js"></script>--}}
{{--<script type="text/javascript" src="js/scrollto.js"></script>--}}
{{--<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>--}}
{{--<script type="text/javascript" src="js/jquery-SmoothScroll-min.js"></script>--}}
{{--<script type="text/javascript" src="js/menuzord.js"></script>--}}
{{--<script type="text/javascript" src="js/jquery.masonry.min.js"></script>--}}
{{--<script type="text/javascript" src="js/fancybox.js"></script>--}}
{{--<script type="text/javascript" src="js/jquery.masonry.min.js"></script>--}}
{{--<script type="text/javascript" src="js/wow.min.js"></script>--}}
{{--<script type="text/javascript" src="js/owl.carousel.min.js"></script>--}}
{{--&lt;!&ndash; Custom script for all pages &ndash;&gt;--}}
{{--<script type="text/javascript" src="js/script.js"></script>--}}

{{--</body>--}}
{{--</html>--}}