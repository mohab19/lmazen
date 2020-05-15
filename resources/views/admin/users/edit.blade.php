@extends('admin.layouts.head')
@section('pageTitle')
    <title>{{ Lang::get('main.users') }}</title>
@endsection
@section('StyleSheets')
<style>
    form ul li{
        list-style: none;
        margin-left: 25px;
    }
    form ul li ol{
        margin-top: 10px;
    }
</style>
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
                    <small>{{ Lang::get('main.edit') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{URL('admin/profiles')}}" class="breadcrumb-link">{{ Lang::get('main.profiles') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.edit') }}</li>
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
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-2">Edit User</h3>
                    <form class="form-horizontal" method="POST" id="EditUsersForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$user->id}}" id="id">
                        <div class="form-body">
                            <div class="alert" style="display: hidden;">
                                <ul id="notification" style="margin-bottom: 0;">

                                </ul>
                            </div>

                            <div class="form-group col-lg-9">
                                <label class="control-label" for="name">{{ Lang::get('main.name') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                                </div>
                            </div>
                            <div class="form-group col-lg-3 text-center" style="margin-top:25px;">
                                @if($user->verified)
                                <span class="badge badge-success changeStatues" data-id="{{$user->id}}" style="cursor: pointer;">Active</span>
                                @else
                                <span class="badge badge-danger changeStatues" data-id="{{$user->id}}" style="cursor: pointer;">Not Active</span>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label class=" control-label" for="website">{{ Lang::get('main.email') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="password">{{ Lang::get('main.password') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="{{ Lang::get('main.enter').Lang::get('main.password') }}">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="confirm_password">{{ Lang::get('main.confirm_password') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="{{ Lang::get('main.enter').Lang::get('main.confirm_password') }}">
                                </div>
                            </div>
                            <!--<div class="text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; border: none">
                                        <img src="#" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div >
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> {{ Lang::get('main.select_image') }} </span>
                                            <span class="fileinput-exists"> {{ Lang::get('main.change') }} </span>
                                            <input type="file" name="image"> </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('main.remove') }} </a>
                                    </div>
                                </div>
                            </div>-->
                            <div class="clearfix" style="height: 30px"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ Lang::get('main.save') }}</button>
                            </div>
                        </div>
                        <div class="clearfix" style="height: 30px"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JavaScript')
<script>
    $(document).ready(function(){
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

        $(document).ready(function () {
            var token = "{{ csrf_token() }}";

            $('#EditUsersForm').on('submit', function(e) {
                e.preventDefault();
                var dataForm = new FormData(this);
                var id = $('#id').val();
                $.ajax({
                    type: 'POST',
                    url: '{{URL("admin/users")}}/' +id,
                    data: dataForm,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#notification').parent().removeClass('alert-danger');
                        $('#notification').parent().addClass('alert-success');
                        $('#notification').html('<li>User Updated successfuly!</li>');
                    },
                    error: function(response) {
                        $('#notification').parent().removeClass('alert-success');
                        $('#notification').parent().addClass('alert-danger');
                        var html = '';
                        $.each(response.responseJSON.errors, function(key, value) {
                            html += '<li>'+value+'</li>';
                        });
                        $('#notification').html(html);
                    }
                });
            });

        });
    });
</script>
@endsection
