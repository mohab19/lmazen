@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('reports.reports')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('reports.reports')
                    <small>@lang('main.view')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('reports.reports')</span></li>
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
                        <div class="card-body text-center">
                            <h2 class="mb-3">@lang('reports.create_report')</h2>
                            <div class="alert" style="display: none;">
                                <ul id="notification">

                                </ul>
                            </div>
                            <form id="reporting" class="row" method="post">
                                @csrf
                                <div class="input-group col-md-5">
                                    <select class="form-control" name="type" id="report-type">
                                        <option selected>Choose...</option>
                                        <option value="income">@lang('reports.income')</option>
                                        <option value="outcome">@lang('reports.outcome')</option>
                                        <option value="best_selling">@lang('reports.best_selling')</option>
                                    </select>
                                </div>
                                <div class="input-group col-md-5">
                                    <select class="form-control"  name="period" id="report-period">
                                        <option selected>Choose...</option>
                                        <option value="1">@lang('reports.weekly')</option>
                                        <option value="2">@lang('reports.monthly')</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary col-md-2">Generate</button>
                            </form>
                        </div>
                        <div id="table" style="padding: 20px;">

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12" id="total" style="display: none;">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h4 class="text-muted">@lang('reports.total')</h4>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                            <!--<div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12" id="subtotal" style="display: none;">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h4 class="text-muted">@lang('reports.subtotal')</h4>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                            <!--<div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                            </div>-->
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
