@extends('admin.master')
@section('title', $web_info->ad_contact)
@section('main')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 ">{{ $web_info->ad_contact }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ asset('admin') }}">{{ $web_info->ad_home }}</a></li>
                            <li class="breadcrumb-item active">{{ $web_info->ad_contact }}</li>
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


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ $web_info->ad_contact_name }}</th>
                                    <th class="hideResponsive768">{{ $web_info->ad_contact_email }}</th>
                                    <th class="hideResponsive768">{{ $web_info->ad_contact_phone }}</th>
                                    <th>{{ $web_info->ad_contact_subject }}</th>
                                    <th>{{ $web_info->ad_contact_option }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- {{ dd($list_group) }} --}}
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td class="tdName">{{$contact->name}}</td>
                                        <td class="tdEmail hideResponsive768">{{$contact->email}}</td>
                                        <td class="tdPhone hideResponsive768">{{$contact->phone}}</td>
                                        <td class="tdSubject">{{$contact->subject}}</td>
                                        <td>
                                            <div class="row form-group">
                                                <span data-toggle="tooltip" title="{{ $web_info->ad_contact_show }}" class="col-sm-6 text-primary btnShowContact" style="cursor: pointer"><i class="far fa-eye"></i></span>
                                                <span class="d-none">{{ $contact->content  }}</span>
                                                <a data-toggle="tooltip" title="{{ $web_info->ad_contact_del }}" href="{{ asset('admin/contact/delete/'.$contact->id) }}" class="col-sm-6 text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row form-group pull-right" style="margin: 10px 0px">
                                {!! $contacts->links('vendor.pagination.bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- Button trigger modal -->
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
        {{--Launch demo modal--}}
    {{--</button>--}}

    <!-- Modal -->
    <div class="modal fade" id="modalShowContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title contactName" id="exampleModalCenterTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div>
                                    Email: <span class="contactEmail"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    Phone: <span class="contactPhone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="contactSubject mb-2 text-bold text-center"></div>
                                <hr>
                                <div class="contactContent"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
@stop


@section('script')
    <script type="text/javascript" src="js/group.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.btnShowContact', function(){
                console.log('ok');
                let name = $(this).parents("td").siblings('.tdName').text();
                let email = $(this).parents("td").siblings('.tdEmail').text();
                let phone = $(this).parents("td").siblings('.tdPhone').text();
                let subject = $(this).parents("td").siblings('.tdSubject').text();
                let content = $(this).next().text();
                $('.contactName').text(name);
                $('.contactEmail').text(email);
                $('.contactPhone').text(phone);
                $('.contactSubject').text(subject);
                $('.contactContent').text(content);
                $('#modalShowContact').modal();
            });
        });
    </script>
@stop