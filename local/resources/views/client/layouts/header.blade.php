<div class="preloader"></div>
<div class="et-header-topped">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <ul class="list-inline et-ht-cntct-details">
                    <li><a href="#"><i class="lnr lnr-map-marker"></i>{{ $web_info->location_head }}</a></li>
                    <li><a href="#"><i class="lnr lnr-phone"></i>{{ $web_info->hotline }}</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="et-social-linked pull-right">
                    <ul class="list-inline">
                        <li><a href="{{ $web_info->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $web_info->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $web_info->dribbble }}"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="{{ $web_info->pinterest }}"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="{{ $web_info->skype }}"><i class="fa fa-skype"></i></a></li>
                        <li><a style="cursor: pointer" onclick="set_lang('vn')">vi</a></li>
                        <li><a style="cursor: pointer" onclick="set_lang('en')">ch</a></li>
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
                <a href="{{ asset('/') }}" class="menuzord-brand"><img src="images/home/logokimlong.png" alt=""></a>
                <ul class="menuzord-menu">
                    {{--<li class="active"><a href="{{ asset('/') }}">Home</a></li>--}}
                    @foreach( $groups as $group)
                        <li class="active"><a href="{{ $group->link == null ? asset('group/'.$group->slug.'--n-'.$group->id) : $group->link }}" {{ $group->link == null ? '' : 'target="_blank"' }} >{{ $group->title }}</a>
                            @if(count($group->group_childs))
                                <ul class="dropdown">
                                    @foreach( $group->group_childs as $group_child )
                                        <li><a href="{{ $group_child->link == null ? asset('group/'.$group_child->slug.'--n-'.$group_child->id) : $group_child->link }}"  {{ $group_child->link == null ? '' : 'target="_blank"' }}>{{ $group_child->title }}</a>
                                            @if(count($group_child->group_childs))
                                                <ul class="dropdown">
                                                    @foreach( $group_child->group_childs as $group_child2)
                                                        <li><a href="{{ $group_child2->link == null ? asset('group/'.$group_child2->slug.'--n-'.$group_child2->id) : $group_child2->link }}"  {{ $group_child2->link == null ? '' : 'target="_blank"' }}>{{ $group_child2->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    {{--<li class="active"><a href="{{ asset('contact') }}">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Liên hệ' : '联系我们' }}</a></li>--}}
                </ul>
            </nav>
        </div>
    </div>
</div>