@extends('client.master')

@section('title', 'Công ty cổ phần Quốc Tế Kim Long')
@section('fb_title', $web_info->footer_left)
@section('fb_des', $web_info->footer_mid1)
@section('fb_img', asset("local/storage/app/article/resized500-".$content->fimage))
@section('main')
	<!-- Home Design -->
	<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
		<!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
		<div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
			<ul><!-- SLIDE  -->
                @if(isset($banners[0]))
				<li data-index="rs-16" data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="{{ asset('local/storage/app/banner/resized-'.$banners[0]->img) }}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Home One" data-description=""  class="thumbonerev">
					<!-- MAIN IMAGE -->
					<img src="{{ asset('local/storage/app/banner/resized-'.$banners[0]->img) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
					<!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-shape tp-shapewrapper"
                        id="rs-1-layer-1" 
                        data-x="['center','center','center','center']" 
                        data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" 
                        data-voffset="['0','0','0','0']" 
                        data-width="full" 
                        data-height="full" data-whitespace="nowrap" 
                        data-transform_idle="o:1;" 
                        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;" 
                        data-transform_out="opacity:0;s:1000;s:1000;" 
                        data-start="0" 
                        data-basealign="slide" 
                        data-responsive_offset="off" 
                        data-responsive="off" style="z-index: 5;background-color:rgba(0, 0, 0, 0.4);border-color:rgba(0, 0, 0, 0);">
                    </div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0 text-uppercase"
						id="slide-1-layer-2" 
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
						data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
						data-fontsize="['70','70','70','45']"
						data-lineheight="['70','70','70','50']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
						data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
						data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
						data-start="1000" 
						data-splitin="chars" 
						data-splitout="none" 
						data-responsive_offset="on" 
						data-elementdelay="0.05" 									
						style="z-index: 5; font-weight: 900; white-space: nowrap;">{{ $banners[0]->text1 }}
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0 text-uppercase"
						id="slide-1-layer-3" 
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
						data-y="['middle','middle','middle','middle']" data-voffset="['62','62','62','61']" 
						data-fontsize="['30','30','25','20']"
						data-lineheight="['50','50','36','30']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
						data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
						data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
						data-start="1500" 
						data-splitin="none" 
						data-splitout="none" 
						data-responsive_offset="on" 
						style="z-index: 6; letter-spacing: 0px; font-weight: 600; white-space: nowrap;">{{ $banners[0]->text2 }}
					</div>

					<!-- LAYER NR. 4 -->
					{{--<div class="tp-caption NotGeneric-Icon tp-resizeme rs-parallaxlevel-0 text-uppercase"--}}
						{{--id="slide-1-layer-4" --}}
						{{--data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" --}}
						{{--data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']" --}}
						{{--data-width="none"--}}
						{{--data-height="none"--}}
						{{--data-whitespace="nowrap"--}}
						{{--data-transform_idle="o:1;"--}}
						{{--data-style_hover="cursor:default;"--}}
						{{--data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" --}}
						{{--data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" --}}
						{{--data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" --}}
						{{--data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" --}}
						{{--data-start="2000" --}}
						{{--data-splitin="none" --}}
						{{--data-splitout="none" --}}
						{{--data-responsive_offset="on" 									--}}
						{{--style="z-index: 7; white-space: nowrap;">we fixing all plumbing --}}
					{{--</div>--}}
				</li>
				@endif
                <!-- SLIDE  -->
                @if(isset($banners[1]))
				<li data-index="rs-17" data-transition="fadetotopfadefrombottom" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500" data-thumb="{{ asset('local/storage/app/banner/resized-'.$banners[1]->img) }}" data-rotate="0" data-saveperformance="off"  data-title="Home Two" data-description="">
					<!-- MAIN IMAGE -->
					<img src="{{ asset('local/storage/app/banner/resized-'.$banners[1]->img) }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
					<!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-shape tp-shapewrapper"
                        id="rs-2-layer-1"
                        data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['0','0','0','0']"
                        data-width="full"
                        data-height="full" data-whitespace="nowrap"
                        data-transform_idle="o:1;"
                        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                        data-transform_out="opacity:0;s:1000;s:1000;"
                        data-start="0"
                        data-basealign="slide"
                        data-responsive_offset="off"
                        data-responsive="off" style="z-index: 5;background-color:rgba(0, 0, 0, 0.7);border-color:rgba(0, 0, 0, 0);">
                    </div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-3"
						id="slide-2-layer-2"
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
						data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
						data-fontsize="['70','70','70','45']"
						data-lineheight="['70','70','70','50']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
						data-mask_in="x:0px;y:0px;"
						data-mask_out="x:inherit;y:inherit;"
						data-start="1000"
						data-splitin="chars"
						data-splitout="none"
						data-responsive_offset="on"
						data-elementdelay="0.05"
						style="z-index: 5; white-space: nowrap;">{{ $banners[1]->text1 }}
					</div>

					<!-- LAYER NR. 3 -->
					{{--<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-2"--}}
						{{--id="slide-2-layer-3"--}}
						{{--data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"--}}
						{{--data-y="['middle','middle','middle','middle']" data-voffset="['60','60','60','55']"--}}
						{{--data-width="none"--}}
						{{--data-height="none"--}}
						{{--data-whitespace="nowrap"--}}
						{{--data-transform_idle="o:1;"--}}
						{{--data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"--}}
						{{--data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"--}}
						{{--data-mask_in="x:0px;y:[100%];"--}}
						{{--data-mask_out="x:inherit;y:inherit;"--}}
						{{--data-start="1500"--}}
						{{--data-splitin="none"--}}
						{{--data-splitout="none"--}}
						{{--data-responsive_offset="on"--}}
						{{--style="z-index: 6; white-space: nowrap;"><a href="#" class="btn btn-default btn-lg et-btn-thm">Read More <i class="lnr lnr-arrow-right"></i></a>--}}
					{{--</div>--}}

					<!-- LAYER NR. 4 -->
					<div class="tp-caption NotGeneric-Icon tp-resizeme rs-parallaxlevel-1"
						id="slide-2-layer-4"
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
						data-y="['middle','middle','middle','middle']" data-voffset="['-68','-68','-68','-68']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
					 	data-style_hover="cursor:default;"
						data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
						data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
						data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
						data-start="2000"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 7; white-space: nowrap;">{{ $banners[1]->text2 }}

					</div>
				</li>
				@endif
                <!-- SLIDE  -->
                @if(isset($banners[2]))
				<li data-index="rs-18" data-transition="zoomin" data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="{{ asset('local/storage/app/banner/resized-'.$banners[2]->img) }}" data-rotate="0" data-saveperformance="off" data-title="Home Three" data-description="">
					<!-- MAIN IMAGE -->
					<img src="{{ asset('local/storage/app/banner/resized-'.$banners[2]->img) }}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
					<!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-shape tp-shapewrapper"
                        id="rs-3-layer-1"
                        data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']"
                        data-voffset="['0','0','0','0']"
                        data-width="full"
                        data-height="full" data-whitespace="nowrap"
                        data-transform_idle="o:1;"
                        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                        data-transform_out="opacity:0;s:1000;s:1000;"
                        data-start="0"
                        data-basealign="slide"
                        data-responsive_offset="off"
                        data-responsive="off" style="z-index: 5;background-color:rgba(0, 0, 0, 0.4);border-color:rgba(0, 0, 0, 0);">
                    </div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
						id="slide-3-layer-2"
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
						data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']"
						data-width="500"
						data-height="140"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;"
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
						data-mask_in="x:0px;y:0px;"
						data-mask_out="x:inherit;y:inherit;"
						data-start="2000"
						data-responsive_offset="on"
						style="z-index: 5;background-color:rgba(0, 0, 0, 0.75);border-color:rgba(0, 0, 0, 0.50);">
					</div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0"
						id="slide-3-layer-3"
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
						data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-60','-60']"
						data-fontsize="['48','48','48','45']"
						data-lineheight="['70','70','70','50']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;"
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
						data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
						data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
						data-start="1000"
						data-splitin="chars"
						data-splitout="none"
						data-responsive_offset="on"
						data-elementdelay="0.05"
						style="z-index: 6; white-space: nowrap;"> {{ $banners[2]->text1 }}
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0"
						id="slide-3-layer-4"
						data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
						data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']"
						data-width="none"
						data-height="none"
						data-whitespace="nowrap"
						data-transform_idle="o:1;"
						data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
						data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
						data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
						data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
						data-start="1500"
						data-splitin="none"
						data-splitout="none"
						data-responsive_offset="on"
						style="z-index: 7; white-space: nowrap;">{{ $banners[2]->text2 }}
					</div>
				</li>
                @endif
			</ul>
			<div class="tp-static-layers"></div>
			<div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	
		</div>
	</div>
	<!-- Introduction Section -->
	<section class="et-introduction">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 et-welcome-half">
					<p class="et-welcome-sub-title text-thm">About our company</p>
					{{--<h1 class="et-welcome-para text-uppercase">Welcome to our <br> plumbers <span class="text-thm">services</span></h1>--}}
					<h1 class="et-welcome-para text-uppercase titleCustom">{{ $content->title }}</h1>
					{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At modi, amet aliquam? Obcaecati, numquam velit cumque ab! Dolorum non cumque alias nulla ea, odio nostrum voluptate magni illo dolorem sunt. Rem obcaecati et laborum eum quia, quas dolorum harum. Adipisci quas autem corporis quae commodi odit doloribus. Dolorum quam asperiores, nemo laudantium sunt, nisi velit, consequatur molestiae.</p>--}}
					{{--<ul class="et-welcome-list-style">--}}
						{{--<li>Duis dapibus odio eu tortor tempus, non posuere purus placerat.</li>--}}
						{{--<li>Nulla ultricies leo ut tincidunt egestas.</li>--}}
						{{--<li>Nullam non mi quis enim pretium feugiat.</li>--}}
						{{--<li>Duis vel nisi ut nibh efficitur sodales.</li>--}}
					{{--</ul>--}}
					{!! $content->summary !!}
					<a href="#" class="btn btn-default btn-lg et-btn-thm">Read More <i class="lnr lnr-arrow-right"></i></a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="et-welcome-thumb text-right">
						<div class="bg_140 pull-right" style="background: url('{{ asset("local/storage/app/article/".$content->fimage) }}') no-repeat center /cover; width: 440px;;"></div>
						{{--<img class="img-responsive" src="images/resource/wel-thumb.png" alt="">--}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services Section -->
	<section class="et-services-one">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center et-service-sect">
					<div class="et-services-title">
						<p class="et-services-sub-title text-thm text-uppercase">About our company</p>
						<h1 class="text-uppercase">our best <span class="text-kl">services</span></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit porro, blanditiis saepe tenetur dignissimos</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($services as $service)
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="et-service-column">
						<div class="et-service-thumb">
							<img class="img-responsive img-fluid" src="{{ asset('local/storage/app/article/resized500-'.$service->fimage) }}" alt="">
							{{--<span class="et-service-thumb2"><img src="images/icons/shawar.jpg" alt=""></span>--}}
							<div class="et-service-overlay">
								<a href="{{ asset('detail/'.$service->slug.'--n-'.$service->id) }}" class="et-srvc-ovrly-icon">
									<img src="images/home/kl_icon.png" alt="">
								</a>
							</div>
						</div>
						<div class="et-service-contnt">
							<h3>{{ $service->title }}</h3>
							<p>{{ cut_string($service->summary, 250)  }}</p>
							<a class="text-thm" href="{{ asset('detail/'.$service->slug.'--n-'.$service->id) }}">read more <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
							<div class="et-slash">//////////////////////////////////////////////////////</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Blog Section -->
	<section class="et-blog-one">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="et-blog-title">
						<p class="et-blog-sub-title text-thm text-uppercase">our works</p>
						<h1 class="text-uppercase">our <span class="text-kl">news & Blog</span></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit porro, blanditiis saepe tenetur dignissimos</p>
					</div>
				</div>
			</div>
			<div class="row second-rawnd">
				@foreach($news as $new)
				<div class="col-xs-12 col-sm-6 col-md-4">
	                <div class="et-blog-col">
		                <div class="et-blog-thumb">
							<a href="{{ asset('detail/'.$new->slug.'--n-'.$new->id) }}">
								<img class="img-responsive img-fluid" src="{{ asset('local/storage/app/article/resized500-'.$new->fimage) }}" alt="">
							</a>
		                    {{--<div class="et-thumb-cntnt">--}}
		                    	{{--<ul class="list-inline">--}}
		                    		{{--<li><a class="et-like" href="#"><i class="pe-7s-like2"></i> 265</a></li>--}}
		                    		{{--<li><a class="et-comment" href="#"><i class="pe-7s-comment"></i> 5822</a></li>--}}
		                    	{{--</ul>--}}
		                    {{--</div>--}}
		                </div>
	                    <div class="et-blog-cntnt">
		                    <h3 class="et-blog-cntnt-title">{{ $new->title }}</h3>
		                    <p>{{ cut_string($new->summary, 250) }}</p>
	                    </div>
	                    <div class="et-blog-ftr">
	                    	<ul class="list-inline">
	                    		<li><a class="et-readmore pull-left text-uppercase" href="{{ asset('detail/'.$new->slug.'--n-'.$new->id) }}"> read more</a></li>
	                    		<li><a class="et-date pull-right text-uppercase" href="{{ asset('detail/'.$new->slug.'--n-'.$new->id) }}"><i class="pe-7s-date"></i> April 5, 2016</a></li>
	                    	</ul>
	                    </div>
	                </div>
				</div>
				@endforeach

			</div>
		</div>
	</section>
	<!-- Footer Section -->
@stop