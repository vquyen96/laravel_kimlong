<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="images/home/kl_icon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="images/home/kl_icon.png" rel="icon" type="image/x-icon" />
    <!-- Plombiers Title -->
    <title>@yield('title')</title>
    <!-- css file -->
    <base href="{{ asset('local/resources/assets') }}/">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans:400,400i,600,600i,700,700i&amp;subset=vietnamese" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="revolution-slider/css/settings.css">
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/navigation.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /** {*/
        /*font-family: 'Merriweather', serif !important;*/
        /*}*/
    </style>
</head>
<body>
<div class="wrapper">
    <div class="currentUrl" style="display: none;">{{ asset('') }}</div>
    {{--<div class="errorAlert">--}}
        {{--@include('errors.note')--}}
    {{--</div>--}}
    @include('client.layouts.header')
    @yield('main')
    @include('client.layouts.footer')



</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/menuzord.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery-SmoothScroll-min.js"></script>
<script type="text/javascript" src="js/fancybox.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="js/script.js"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
		(Load Extensions only on Local File Systems !
		 The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
@yield('script')
<!-- END REVOLUTION SLIDER -->
<script type="text/javascript">
    var url = $('.currentUrl').text();

    function set_lang(lang) {
        $.ajax({
            url: url+'/set_lang/' + lang,
            method: 'get',
            dataType: 'json',
        }).fail(function (ui, status) {
        }).done(function (data, status) {
            if (data.status == 1) window.location= url;
        })
    }

    var tpj=jQuery;
    var revapi4;
    tpj(document).ready(function() {
        if(tpj("#rev_slider_4_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_4_1");
        }else{
            revapi4 = tpj("#rev_slider_4_1").show().revolution({
                sliderType:"auto",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:600,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        }
                    }
                    ,
                    bullets: {
                        enable:true,
                        hide_onmobile:true,
                        hide_under:600,
                        style:"metis",
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        direction:"horizontal",
                        h_align:"center",
                        v_align:"bottom",
                        h_offset:0,
                        v_offset:30,
                        space:5,
                        tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">Kim long</span>'
                    }
                },
                viewPort: {
                    enable:true,
                    outof:"pause",
                    visible_area:"80%"
                },
                responsiveLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[800,800,500,400],
                lazyType:"none",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,50],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/
</script>
</body>
</html>