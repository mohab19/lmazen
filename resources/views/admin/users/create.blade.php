@extends('admin.layouts.head')
@section('pageTitle')
    <title>@lang('users.users')</title>
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
                <h1 class="page-title">@lang('users.users')
                    <small>@lang('users.add_new')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL((app()->getLocale().'/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{URL((app()->getLocale().'/admin/users')}}" class="breadcrumb-link"><span>@lang('users.users')</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('main.add')</li>
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
                    <h3 class="card-title border-bottom pb-2">@lang('users.add_new')</h3>
                    <div class="alert alert-dismissible" id="notification" style="display: none;">
                        <ul style="margin-bottom: 0;">

                        </ul>
                    </div>
                    <form id="form">
                        @csrf
                        <input type="hidden" id="form_name" value="User" data-id="users">
                        <input type="hidden" id="route" value="{{route('users.store', app()->getLocale())}}">
                        <div class="form-group">
                            <label for="name" class="col-form-label">@lang('users.name')</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-form-label">@lang('users.mobile')</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">@lang('users.email')</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="salary" class="col-form-label">@lang('users.salary')</label>
                            <input type="number" name="salary" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="password">{{ Lang::get('main.password') }}  <span class="required"> * </span></label>
                            <input type="password" class="form-control" id="password" name="password" data-required="1">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="confirm_password">{{ Lang::get('main.confirm_password') }}  <span class="required"> * </span></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" data-required="1">
                        </div>
                        <div class="col-sm-12 text-center pl-0 mt-3" style="float: right;">
                            <button type="submit" class="btn btn-space btn-primary col-sm-4">@lang('main.save')</button>
                            <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary col-sm-4">@lang('main.cancel')</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
