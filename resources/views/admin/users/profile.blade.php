@extends('layouts.head')
@section('pageTitle')
    <title>{{ Lang::get('main.home_page_title') }}</title>
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
                <h2 class="page-title"> {{ Lang::get('main.user_profile') }} | {{ Lang::get('main.account') }}</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{URL('admin/users')}}" class="breadcrumb-link"><span>{{ Lang::get('main.users') }}</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.add') }}</li>
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
                    <h3>{{ Lang::get('main.user_account_page') }}</h3>
                    <form class="form-horizontal" method="POST" action="admin/profile" files="true" id="addProfilesForm">
                        <!-- BEGIN PROFILE SIDEBAR -->
                        <div class="profile-sidebar">
                            <!-- PORTLET MAIN -->
                            <div class="portlet light profile-sidebar-portlet ">
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> {{ Auth::user()->name }} </div>
                                </div>
                                <!-- SIDEBAR USERPIC -->
                                <div class="text-center">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; border: none">
                                            <img src="@if(file_exists(public_path(Auth::user()->img_dir.Auth::user()->img))&&!empty(Auth::user()->img_dir)&&!empty(Auth::user()->img)){{ asset(Auth::user()->img_dir.Auth::user()->img) }}@else{{ asset('img/Users/default_image.png') }}@endif" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div >
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> {{ Lang::get('main.select_image') }} </span>
                                                <span class="fileinput-exists"> {{ Lang::get('main.change') }} </span>
                                                <input type="file" name="image"> </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> {{ Lang::get('main.remove') }} </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <!-- END SIDEBAR USER TITLE -->
                            </div>
                            <!-- END PORTLET MAIN -->
                        </div>
                        <!-- END BEGIN PROFILE SIDEBAR -->
                        <!-- BEGIN PROFILE CONTENT -->
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light ">
                                        <div class="form-group">
                                            <label for="name" class="control-label">{{ Lang::get('main.name') }}</label>
                                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="{{ Lang::get('main.enter').Lang::get('main.name') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label">{{ Lang::get('main.email') }}</label>
                                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="{{ Lang::get('main.enter').Lang::get('main.email') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="control-label">{{ Lang::get('main.username') }}</label>
                                            <input type="text" id="username" name="username" value="{{ Auth::user()->username }}" placeholder="{{ Lang::get('main.enter').Lang::get('main.username') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="old_password" class="control-label">{{ Lang::get('main.old_password') }}</label>
                                            <input type="password" id="old_password" required name="old_password" placeholder="{{ Lang::get('main.enter').Lang::get('main.old_password') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password" class="control-label">{{ Lang::get('main.new_password') }}</label>
                                            <input type="password" id="new_password" name="new_password" placeholder="{{ Lang::get('main.enter').Lang::get('main.new_password') }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password" class="control-label">{{ Lang::get('main.confirm_password') }}</label>
                                            <input type="password" id="confirm_password" name="confirm_password" placeholder="{{ Lang::get('main.enter').Lang::get('main.confirm_password') }}" class="form-control" />
                                        </div>
                                        <div class="margiv-top-10 text-center">
                                            <button type="submit" class="btn btn-primary">{{ Lang::get('main.save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $(document).on('change','#all_projects',function(){
            if($(this).is(':checked')){
                $("#projects_ids").attr('disabled','disabled');
            }else{
                $("#projects_ids").removeAttr('disabled')
            }
        });
    });
</script>
@endsection
