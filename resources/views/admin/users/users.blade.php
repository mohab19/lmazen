@extends('admin.layouts.head')
@section('title')
    <title>{{ Lang::get('main.home_page_title') }}</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title"> {{ Lang::get('main.users') }}
                    <small>{{ Lang::get('main.view') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.users') }}</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.name') }}</th>
                                            <th width="20%">{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.email') }}</th>
                                            <th>{{ Lang::get('main.active') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr class="delete_{{$user->id}}">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>
                                                    <img src="{{asset($user->img_dir.$user->img)}}" alt="">
                                                </td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if($user->verified)
                                                    <span class="badge badge-success changeStatues" data-id="{{$user->id}}" style="cursor: pointer;">Active</span>
                                                    @else
                                                    <span class="badge badge-danger changeStatues" data-id="{{$user->id}}" style="cursor: pointer;">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="{{URL('admin/users/' . $user->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$user->id}}" data-type="User" data-url="users" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.name') }}</th>
                                            <th width="20%">{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.email') }}</th>
                                            <th>{{ Lang::get('main.active') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('JavaScript')
<!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script>
    $(document).ready(function () {
        var token = "{{ csrf_token() }}";
        $(document).on('click', '.changeStatues', function () {
            var id = $(this).data('id');
            var here = $(this);
            $.ajax({
                type: "GET",
                url: "{{URL('admin/users/activation')}}/" +id,
                success: function (response) {
                    if(response == 0) {
                        here.removeClass('badge-success').addClass('badge-danger').html('Not Active');
                    } else {
                        here.removeClass('badge-danger').addClass('badge-success').html('Active');
                    }
                }
            });
        });

        $(document).on("click", ".image-link", function () {
            $("#image-modal .modal-body img").attr('src', $(this).find('img').attr('src'));
        });
    });
    </script>
@endsection
