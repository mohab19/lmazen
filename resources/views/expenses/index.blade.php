@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('title')
    <title>@lang('expenses.expenses')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('expenses.expenses')
                    <small>@lang('main.view')</small>
                </h1>
                <a href="{{ URL( app()->getLocale() . '/admin/expenses/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">@lang('expenses.add_new')
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('expenses.expenses')</span></li>
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
                            <div class="alert">
                                <ul id="alert-div" style="margin-bottom: 0px;">

                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('expenses.id')</th>
                                            <th>@lang('expenses.name')</th>
                                            <th>@lang('expenses.type')</th>
                                            <th>@lang('expenses.description')</th>
                                            <th>@lang('expenses.amount')</th>
                                            <th>@lang('expenses.date')</th>
                                            <th>@lang('expenses.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $key => $expense)
                                            <tr class="delete_{{$expense->id}}">
                                                <td>{{$expense->id}}</td>
                                                <td>{{$expense->name}}</td>
                                                <td>{{$expense->type}}</td>
                                                <td>{{$expense->description}}</td>
                                                <td>{{$expense->amount}}</td>
                                                <td>{{$expense->created_at}}</td>
                                                <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                                                    <a class="btn btn-success" href="{{URL( app()->getLocale() . '/admin/expenses/' . $expense->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$expense->id}}" data-type="Expenses" data-url="expenses" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>@lang('expenses.id')</th>
                                            <th>@lang('expenses.name')</th>
                                            <th>@lang('expenses.type')</th>
                                            <th>@lang('expenses.description')</th>
                                            <th>@lang('expenses.amount')</th>
                                            <th>@lang('expenses.date')</th>
                                            <th>@lang('expenses.action')</th>
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
