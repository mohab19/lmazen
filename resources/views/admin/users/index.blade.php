@extends('admin.layouts.head')
@section('title')
    <title>@lang('users.users')</title>
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
                    <small>@lang('main.view')</small>
                </h1>
                <a href="{{ URL( app()->getLocale() . '/admin/users/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">@lang('users.add_new')
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('users.users')</span></li>
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
                                            <th>@lang('users.id')</th>
                                            <th>@lang('users.name')</th>
                                            <th>@lang('users.email')</th>
                                            <th>@lang('users.mobile')</th>
                                            <th>@lang('users.salary')</th>
                                            <th>@lang('users.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr class="delete_{{$user->id}}">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>{{$user->salary}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{ URL( app()->getLocale() . '/admin/users/' . $user->id . '/edit')}}" style="padding: 5px 10px;">
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
                                            <th>@lang('users.id')</th>
                                            <th>@lang('users.name')</th>
                                            <th>@lang('users.email')</th>
                                            <th>@lang('users.mobile')</th>
                                            <th>@lang('users.salary')</th>
                                            <th>@lang('users.action')</th>
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
