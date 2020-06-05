@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('customers.customers')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('customers.customers')
                    <small>@lang('main.edit')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('customers.customers')</span></li>
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
                        <h5 class="card-header">@lang('customers.edit')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form" class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name" class="col-form-label">@lang('customers.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="mobile" class="col-form-label">@lang('customers.mobile')</label>
                                    <input type="text" name="mobile" class="form-control" value="{{$customer->mobile}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-form-label">@lang('customers.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{$customer->email}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="address" class="col-form-label">@lang('customers.address')</label>
                                    <textarea name="address" rows="1" cols="80" class="form-control" disabled>{{$customer->address}}</textarea>
                                </div>
                            </form>
                            <hr>
                            <div class="">
                                <table id="example" class="table table-striped table-bordered second text-center">
                                    <thead>
                                        <tr>
                                            <th>@lang('customers.id')</th>
                                            <th>@lang('customers.customer')</th>
                                            <th>@lang('customers.product')</th>
                                            <th>@lang('customers.quantity')</th>
                                            <th>@lang('customers.amount')</th>
                                            <th>@lang('customers.paid')</th>
                                            <th>@lang('customers.date')</th>
                                            <th>@lang('customers.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer->CustomerHistores as $key => $history)
                                            <tr>
                                                <td>{{$history->id}}</td>
                                                <td>{{$history->Customer->name}}</td>
                                                <td>{{$history->Product->name}}</td>
                                                <td>{{$history->quantity}}</td>
                                                <td>{{$history->amount}}</td>
                                                <td>
                                                    @if($history->paid == 1)
                                                    <span class="badge badge-success"><i class="fas fa-check"></i></span>
                                                    @else
                                                    <span class="badge badge-danger"><i class="fas fa-times"></i></span>
                                                    @endif
                                                </td>
                                                <td>{{$history->created_at}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success" id="pay_check" data-id="{{$history->id}}" @if($history->paid == 1) disabled @endif><i class="far fa-paper-plane"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-undo"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>@lang('customers.id')</th>
                                            <th>@lang('customers.customer')</th>
                                            <th>@lang('customers.product')</th>
                                            <th>@lang('customers.quantity')</th>
                                            <th>@lang('customers.amount')</th>
                                            <th>@lang('customers.paid')</th>
                                            <th>@lang('customers.date')</th>
                                            <th>@lang('customers.action')</th>
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
