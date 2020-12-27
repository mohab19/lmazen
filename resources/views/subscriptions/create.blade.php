@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('subscriptions.subscriptions')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('subscriptions.subscriptions')
                    <small>@lang('main.create')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('subscriptions.subscriptions')</span></li>
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
                        <h5 class="card-header">@lang('subscriptions.add_new')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form">
                                @csrf
                                <input type="hidden" id="form_name" value="Subscription" data-id="subscriptions">
                                <input type="hidden" id="route" value="{{route('subscriptions.store', app()->getLocale())}}">
                                <select name="customer_id" id="customer_id"  class="form-control" required>
                                    <option value="0" disabled selected>Select Customer: </option>
                                    @foreach($customers as $key => $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="system_id" id="system_id"  class="form-control" required>
                                    <option value="0" disabled selected>Select System: </option>
                                    @foreach($systems as $key => $system)
                                    <option value="{{$system->id}}">{{$system['name_'.Lang::locale()]}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="no_of_copies" class="col-form-label">@lang('subscriptions.no_of_copies')</label>
                                    <input type="text" name="no_of_copies" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="subscription_fees" class="col-form-label">@lang('subscriptions.subscription_fees')</label>
                                    <input type="text" name="subscription_fees" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="started_at" class="col-form-label">@lang('subscriptions.started_at')</label>
                                    <input type="date" name="started_at" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ended_at" class="col-form-label">@lang('subscriptions.ended_at')</label>
                                    <input type="date" name="ended_at" class="form-control" required>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="is_paid" class="custom-control-input" id="is_paid" value="1">
                                    <label class="custom-control-label" for="is_paid"> Customer Paid Fees</label>
                                </div>
                                <br>

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
