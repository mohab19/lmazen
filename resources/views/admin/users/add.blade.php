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
                <h1 class="page-title"> {{ Lang::get('main.users') }}
                    <small>{{ Lang::get('main.add') }}</small>
                </h1>
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
                    <h3 class="card-title border-bottom pb-2">Add new User</h3>
                    <form class="form-horizontal" method="POST" action="admin/users" id="addProfilesForm">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                {{ Lang::get('main.form_validation_error') }}
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                {{ Lang::get('main.form_validation_success') }}
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="profile_id">{{ Lang::get('main.profiles') }}</label>
                                <select style="width:100%" id="profile_id" class="sel2" name="profile_id">
                                    @foreach($profiles as $profile)
                                        <option @if(old('profile_id')==$profile->id) selected="selected" @endif value="{{ $profile->id }}">{{ $profile->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-9">
                                <label class="control-label" for="name">{{ Lang::get('main.name') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" data-required="1" placeholder="{{ Lang::get('main.enter').Lang::get('main.name') }}">
                                </div>
                            </div>
                            <div class="form-group col-lg-3 text-center" style="margin-top:25px;">
                                <input type="checkbox" class="make-switch" name="active" value="1" checked data-size="small" data-on-color="success" data-on-text="active" data-off-color="default" data-off-text="unActive">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label class=" control-label" for="email">{{ Lang::get('main.email') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" data-required="1" placeholder="{{ Lang::get('main.enter').Lang::get('main.email') }}">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="username">{{ Lang::get('main.username') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" id="username" value="{{ old('username') }}" name="username"  data-required="1" placeholder="{{ Lang::get('main.enter').Lang::get('main.username') }}">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="password">{{ Lang::get('main.password') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" id="password" name="password" data-required="1" placeholder="{{ Lang::get('main.enter').Lang::get('main.password') }}">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="control-label" for="confirm_password">{{ Lang::get('main.confirm_password') }}  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" data-required="1" placeholder="{{ Lang::get('main.enter').Lang::get('main.confirm_password') }}">
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; border: none">
                                        <img src="{{ asset('img/Users/default_image.png') }}" alt="" /> </div>
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
                            <div class="clearfix" style="height: 30px"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ Lang::get('main.add') }}</button>
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
