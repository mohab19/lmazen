@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('brands.brands')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('brands.brands')
                    <small>@lang('main.create')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('brands.brands')</span></li>
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
                        <h5 class="card-header">@lang('brands.add_new')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form">
                                @csrf
                                <input type="hidden" id="form_name" value="Brand" data-id="brands">
                                <input type="hidden" id="route" value="{{route('brands.store')}}">
                                <div class="form-group">
                                    <label for="name_ar" class="col-form-label">@lang('brands.name_ar')</label>
                                    <input type="text" name="name_ar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name_en" class="col-form-label">@lang('brands.name_en')</label>
                                    <input type="text" name="name_en" class="form-control" required>
                                </div>
                                <div class="col-sm-12 text-center pl-0 mt-3" style="float: right;">
                                    <button type="submit" class="btn btn-space btn-primary col-sm-4">@lang('main.save')</button>
                                    <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary col-sm-4">@lang('main.cancel')</span></a>
                                </div>
                            </form>
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