@extends('admin.master')
@section('title', $web_info->ad_recruit)
@section('main')
    <style type="text/css">
        ::-webkit-scrollbar {
            width: 0px;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 ">{{ $web_info->ad_news_list }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home }}</a></li>
                            <li class="breadcrumb-item active">{{ $web_info->ad_news_list }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('error'))
                            <div class="alert alert-error">
                                <p>{{ session('error') }}</p>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif

                        <div class="card-header">
                            <a href="{{route('form_articel',0)}}" class="btn btn-primary"><h3 class="card-title">{{ $web_info->ad_news_add }}</h3></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                {{--{{dd($paramater)}}--}}
                                <form action="{{ url('/admin/articel/'.Request::segment(3)) }}" method="get">
                                    <div class="row form-group">
                                        <div class="col-md-3 mb-2">
                                            <input value="{{isset($paramater['key_search']) ? $paramater['key_search'] : ''}}" class="form-control" name="articel[key_search]" placeholder="{{ $web_info->ad_news_search1 }}">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <select class="form-control select2" multiple="multiple"
                                                    data-placeholder="{{ $web_info->ad_news_search2 }}" name="articel[group_id][]"
                                                    style="width: 100%;">
                                                @foreach($list_group as $group_item)
                                                    <option {{isset($paramater['group_id']) && count($paramater['group_id']) ? in_array($group_item->id,$paramater['group_id']) ? 'selected' : '' : ''}} value="{{ $group_item->id }}">{{ $group_item->title }}</option>
                                                @endforeach
                                            </select>
                                             
                                        </div>

                                        @if(Auth::user()->level < 3)
                                        <div class="col-md-2 mb-2">
                                            <select class="form-control select2" multiple="multiple"
                                                    data-placeholder="{{ $web_info->ad_news_search3 }}" name="articel[member][]"
                                                    style="width: 100%;">
                                                @foreach ($list_member as $account)
                                                    <option {{isset($paramater['member']) && count($paramater['member']) ? in_array($account->id, $paramater['member']) ? 'selected' : '' : ''}} value="{{ $account->id }}">{{ $account->username }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        @endif
                                        
                                        <div class="com-md-3 mb-2 d-flex">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-default" title="{{ isset($paramater['from']) ? $paramater['from'] : ''}} - {{ isset($paramater['to']) ? $paramater['to'] : ''}}" 
                                                        id="daterange-btn"><span><i class="fa fa-calendar"></i></span>
                                                </button>
                                                <input id="from" name="articel[from]" class="d-none" value="{{ isset($from) ? date('m/d/Y',$from) : ''}}">
                                                <input id="to" name="articel[to]" class="d-none" value="{{ isset($to) ? date('m/d/Y',$to) : '' }}">
                                            </div>
                                            <div class="mt-1">
                                                <b>
                                                    @if (isset($from))
                                                        <span id="from_show">
                                                            {{date('d/m/Y',$from)}} 
                                                        </span>
                                                        
                                                        <span class="text-warning">đến</span> 
                                                        
                                                        <span id="to_show">
                                                            {{date('d/m/Y',$to)}} 
                                                        </span>
                                                    @else  
                                                        {{ $web_info->ad_news_search4 }}
                                                    @endif
                                                        
                                                </b>
                                            </div>
                                        </div>
                                        <div class="col mb-2 float-right">
                                            <button class="btn btn-primary float-right" type="submit"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ $web_info->ad_news_image }}</th>
                                    
                                    <th class="titleTable">{{ $web_info->ad_news_name }}</th>
                                    {{--<th>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Lượt xem' : 'View'}}</th>--}}
                                    <th class="{{ Request::segment(2) == 'recruitment' ? 'd-none' : '' }}">{{ $web_info->ad_news_cate }}</th>
                                    <th>{{ $web_info->ad_news_user }}</th>
                                    {{--<th class="nowrap">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Người duyệt' : 'Approved by'}}</th>--}}
                                    @if(Request::segment(3) != 'approved_cgroup')
                                        <th>{{ $web_info->ad_news_status }}</th>
                                    @endif
                                    {{-- @if(Auth::user()->level > 2 || Request::segment(3) == 'approved_cgroup')
                                        <th style="min-width: 50px">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Duyệt bài' : 'Approve'}}</th>
                                    @endif --}}
                                    <th>{{ $web_info->ad_news_option }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_articel as $articel)
                                    <tr>

                                        <td>
                                            <div class="avatar">
                                                <img src="{{ isset($articel->fimage)  && $articel->fimage ? (file_exists(storage_path('app/article/resized200-'.$articel->fimage)) ? asset('local/storage/app/article/resized200-'.$articel->fimage) : (file_exists(resource_path($articel->fimage)) ? asset('/local/resources'.$articel->fimage) : 'images/default-image.png')) : 'images/default-image.png' }}">
                                            </div>
                                        </td>
                                        
                                       
                                        <td class="a_hover">
                                            <a  style="cursor: pointer;"  onclick="view_articel_now('{{route('view_log_now',$articel->id)}}')" >
                                                 {{$articel->title}}
                                            </a>
                                        </td>
                                        {{--<td>--}}
                                             {{--{{ $articel->view == null ? 0 : $articel->view }}--}}
                                        {{--</td>--}}
                                        <td class="{{ Request::segment(2) == 'recruitment' ? 'd-none' : '' }}">
                                            <?php $count = 0?>
                                            @foreach($list_group as $articel_item)
                                                @if (in_array($articel_item->id,explode(' ',$articel->groupid)))
                                                    <button class="btn btn-outline-default btn-sm">
                                                        {{ $articel_item->title }}
                                                    </button>
                                                    <?php $count++?>
                                                @endif
                                            @endforeach
                                            @if ($count == 0)
                                                <button class="btn btn-outline-default btn-sm">
                                                    {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Lỗi' : 'Error'}}
                                                </button>
                                            @endif
                                            
                                        </td>
                                        {{--<td>--}}
                                            {{--@if(isset($articel->author))--}}
                                                {{--<div class="">{{ $articel->author  }} </div>--}}
                                                {{--<div class="timeTiny">{{ $articel->author_date  }} </div>--}}

                                            {{--@else--}}
                                                {{--{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Không còn' : 'No more'}} --}}
                                            {{--@endif--}}
                                            {{----}}
                                        {{--</td>--}}
                                        <td>
                                            @if(isset($articel->approved))
                                                <div class="">{{ $articel->approved  }} </div>
                                                <div class="timeTiny">{{ $articel->approved_date  }} </div>

                                            @else
                                                @if(isset($articel->author))
                                                    <div class="">{{ $articel->author  }} </div>
                                                    <div class="timeTiny">{{ $articel->author_date  }} </div>

                                                @else
                                                    {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Không còn' : 'No more'}} 
                                                @endif
                                            @endif
                                            
                                        </td>
                                        
                                        @if(Request::segment(3) != 'approved')
                                        
                                            <td>
                                                @switch($articel->status)
                                                    @case(0)
                                                        <button class="btn btn-block btn-sm btn-default btnOn">
                                                            {{ $web_info->ad_news_stop }}
                                                        </button>
                                                        @break
                                                    @case(1)
                                                        <button class="btn btn-block btn-sm btn-success btnOff">
                                                            {{ $web_info->ad_news_run }} 
                                                        </button>
                                                        @break
                                                    @default
                                                        <button class="btn btn-block btn-sm btn-danger">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Lỗi' : 'Error'}}</button>
                                                        @break
                                                @endswitch
                                                <div class="id_group" style="display: none;">{{$articel->id}}</div>
                                            </td>
                                        @endif
                                       
                                        <td>
                                            <div class="row form-group">
                                                @if($articel->status >= Auth::user()->level-1 || Auth::user()->level < 3 ||$articel->status == 0)
                                                    <a data-toggle="tooltip" title="{{ $web_info->ad_news_del }}" href="{{route('delete_articel',$articel->id)}}" class="col-sm-4 text-danger btnDelete" @if ($articel->status == 1) style="display: none" @endif  onclick="return confirm('{{ $web_info->ad_news_delconfirm }}')"><i
                                                            class="fa fa-trash"></i></a>
                                                    <a href="{{route('form_articel',$articel->id)}}" data-toggle="tooltip" title="{{ $web_info->ad_news_edit }}" class="col-sm-4 text-primary"><i class="fa fa-wrench"></i></a>
                                                @endif

                                                    
                                                
                                                <a style="cursor: pointer" onclick="historyArticel({{$articel->id}})"   title="{{ $web_info->ad_news_history }}" class="col-sm-4 text-dark"><i class="fa fa-book"></i></a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row form-group pull-right" style="margin: 10px 0px">
                                {!! $list_articel->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="history_articel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    </div>


        <div class="modal fade" id="history_articel_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lịch sử sửa đổi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>


    </div>
@stop

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
@stop

@section('script')
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript" src="js/article.js"></script>
    <script>
        // $('.articleTimeBtnEdit').click(function(){
        //     $(this).prev().hide();
        //     $(this).next().show();
        //     $(this).hide();
        // });

        // $('.btn_send_time').click(function(){

        // });

        function view_articel_now(url) {
            newwindow=window.open(url,'{{ $web_info->title_web }}','height=500,width=800,top=150,left=200, location=0');
            if (window.focus) {newwindow.focus()}
            return false;
        }
    </script>
    <script>
        console.log('Hello Human',moment());
        $('#daterange-btn').daterangepicker(
            {
                opens: "right",
                /*autoApply: true,*/
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Chọn",
                    "cancelLabel": "Hủy",
                    "fromLabel": "Từ",
                    "toLabel": "Đến",
                    "customRangeLabel": "Tùy chọn",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "CN",
                        "T2",
                        "T3",
                        "T4",
                        "T5",
                        "T6",
                        "T7"
                    ],
                    "monthNames": [
                        "Tháng 1",
                        "Tháng 2",
                        "Tháng 3",
                        "Tháng 4",
                        "Tháng 5",
                        "Tháng 6",
                        "Tháng 7",
                        "Tháng 8",
                        "Tháng 9",
                        "Tháng 10",
                        "Tháng 11",
                        "Tháng 12"
                    ],
                    "firstDay": 1
                },
                ranges   : {
                    'Hôm nay'       : [moment(), moment()],
                    'Hôm qua'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 ngày trước' : [moment().subtract(6, 'days'), moment()],
                    '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                    'Tháng này'  : [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment(),
                endDate  : moment()
            },
            function (start, end) {
                // $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                $('#from').val(start.format('YYYY-MM-DD'));
                $('#from_show').text(start.format('DD/MM/YYYY'));
                $('#to').val(end.format('YYYY-MM-DD'));
                $('#to_show').text(end.format('DD/MM/YYYY'));

            }
        );
        $('#daterange-btn').on('apply.daterangepicker', function(ev, picker) {
            $('#from').val(picker.startDate.format('YYYY-MM-DD'));
            $('#to').val(picker.endDate.format('YYYY-MM-DD'));
            $('#search').submit();
        });

    </script>
@stop