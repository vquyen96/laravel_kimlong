<div class="preloader"></div>
<div class="et-header-topped">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <ul class="list-inline et-ht-cntct-details">
                    <li><a href="#"><i class="lnr lnr-map-marker"></i> 45 Park Avenue, New York</a></li>
                    <li><a href="#"><i class="lnr lnr-phone"></i> (+01) 123 456 7896</a></li>
                </ul>
            </div>
            <div class="col-md-7">
                <div class="et-social-linked pull-right">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Styles -->
<div class="header-nav">
    <div class="main-header-nav scrollingto-fixed">
        <div class="container">
            <nav id="menuzord" class="menuzord">
                <a href="#" class="menuzord-brand"><img src="images/home/logokimlong.png" alt=""></a>
                <ul class="menuzord-menu">
                    {{--<li class="active"><a href="{{ asset('/') }}">Home</a></li>--}}
                    @foreach( $groups as $group)
                        <li class="active"><a href="index.html">{{ $group->title }}</a>
                            @if(count($group->group_childs))
                                <ul class="dropdown">
                                    @foreach( $group->group_childs as $group_child )
                                        <li><a href="index.html">{{ $group_child->title }}</a>
                                            @if(count($group_child->group_childs))
                                                <ul class="dropdown">
                                                    @foreach( $group_child->group_childs as $group_child2)
                                                        <li><a href="blog-left-sidebar.html">{{ $group_child2->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <li class="active"><a href="{{ asset('contact') }}">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>