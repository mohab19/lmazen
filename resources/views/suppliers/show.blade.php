@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('suppliers.suppliers')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('suppliers.suppliers')
                    <small>@lang('main.show')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('suppliers.suppliers')</span></li>
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
                        <h5 class="card-header">@lang('suppliers.show')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form" class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name" class="col-form-label">@lang('suppliers.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{$supplier->name}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="mobile" class="col-form-label">@lang('suppliers.mobile')</label>
                                    <input type="text" name="mobile" class="form-control" value="{{$supplier->mobile}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-form-label">@lang('suppliers.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{$supplier->email}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="address" class="col-form-label">@lang('suppliers.address')</label>
                                    <textarea name="address" rows="1" cols="80" class="form-control" disabled>{{$supplier->address}}</textarea>
                                </div>
                            </form>
                            <hr>
                            <div class="">
                                <table id="example" class="table table-striped table-bordered second text-center">
                                    <thead>
                                        <tr>
                                            <th>@lang('suppliers.id')</th>
                                            <th>@lang('suppliers.supplier')</th>
                                            <th>@lang('suppliers.description')</th>
                                            <th>@lang('suppliers.amount')</th>
                                            <th>@lang('suppliers.paid')</th>
                                            <th>@lang('suppliers.remain')</th>
                                            <th>@lang('suppliers.date')</th>
                                            <th>@lang('suppliers.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($supplierAccount as $key => $account)
                                            <tr>
                                                <td>{{$account->id}}</td>
                                                <td>{{$account->Supplier->name}}</td>
                                                <td>{{$account->description}}</td>
                                                <td>{{$account->amount}}</td>
                                                <td>{{$account->paid}}</td>
                                                <td>{{$account->remain}}</td>
                                                <td>{{$account->created_at}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success" onclick="fill_account(this)"  data-id="{{$account->id}}" data-toggle="modal" data-target="#exampleModal" @if($account->remain == 0) disabled @endif><i class="far fa-paper-plane"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>@lang('suppliers.id')</th>
                                            <th>@lang('suppliers.supplier')</th>
                                            <th>@lang('suppliers.description')</th>
                                            <th>@lang('suppliers.amount')</th>
                                            <th>@lang('suppliers.paid')</th>
                                            <th>@lang('suppliers.remain')</th>
                                            <th>@lang('suppliers.date')</th>
                                            <th>@lang('suppliers.action')</th>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('suppliers.pay_bill')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert" id="sell-alert" style="display: none;">
                                    <ul style="margin-bottom: 0px;">

                                    </ul>
                                </div>
                                <input type="hidden" name="account_id" id="account_id" value="">
                                <div class="form-group">
                                    <label for="paid" class="col-form-label">@lang('suppliers.paid')</label>
                                    <input type="number" min="1"  name="paid" id="paid" class="form-control" value="1" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="pay_bill">@lang('suppliers.pay')</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('suppliers.close')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
