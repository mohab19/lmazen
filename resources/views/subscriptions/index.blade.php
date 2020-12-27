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
                    <small>@lang('main.view')</small>
                </h1>
                <a href="{{ URL( app()->getLocale() . '/admin/subscriptions/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">@lang('main.add_new')
                    <i class="fa fa-plus"></i>
                </a>
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
                        <div class="card-body">
                            <div class="alert alert-dismissible fade show" style="display: none;">
                                <ul id="alert-div" style="margin-bottom: 0px;">

                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>@lang('customers.customer')</th>
                                            <th>@lang('systems.system')</th>
                                            <th>@lang('subscriptions.no_of_copies')</th>
                                            <th>@lang('subscriptions.subscription_fees')</th>
                                            <th>@lang('subscriptions.is_paid')</th>
                                            <th>@lang('subscriptions.started_at')</th>
                                            <th>@lang('subscriptions.ended_at')</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscriptions as $key => $subscription)
                                            <tr class="delete_{{$subscription->id}}">
                                                <td>{{$subscription->id}}</td>
                                                <td>{{$subscription->Customer->name}}</td>
                                                <td>{{$subscription->System["name_".app()->getLocale()]}}</td>
                                                <td>{{$subscription->no_of_copies}}</td>
                                                <td>{{$subscription->subscription_fees}}</td>
                                                <td>
                                                    @if($subscription->is_paid == 0)
                                                    <span class="badge badge-danger pay" data-id="{{$subscription->id}}" style="cursor: pointer;"><i class="fas fa-times"></i></span>
                                                    <span class="badge badge-success pay" data-id="{{$subscription->id}}"  style="cursor: pointer;display: none;"><i class="fas fa-check"></i></span>
                                                    @else
                                                    <span class="badge badge-danger pay" data-id="{{$subscription->id}}" style="cursor: pointer;display: none;"><i class="fas fa-times"></i></span>
                                                    <span class="badge badge-success pay" data-id="{{$subscription->id}}"  style="cursor: pointer;"><i class="fas fa-check"></i></span>
                                                    @endif
                                                </td>
                                                <td>{{$subscription->started_at}}</td>
                                                <td>{{$subscription->ended_at}}</td>
                                                <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                                                    <a class="btn btn-success" href="{{URL( app()->getLocale() . '/admin/subscriptions/' . $subscription->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$subscription->id}}" data-type="Subscription" data-url="subscriptions" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>@lang('customers.customer')</th>
                                            <th>@lang('systems.system')</th>
                                            <th>@lang('subscriptions.no_of_copies')</th>
                                            <th>@lang('subscriptions.subscription_fees')</th>
                                            <th>@lang('subscriptions.is_paid')</th>
                                            <th>@lang('subscriptions.started_at')</th>
                                            <th>@lang('subscriptions.ended_at')</th>
                                            <th>{{ Lang::get('main.action') }}</th>
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
@section('JavaScript')
<script type="text/javascript">
    $(document).ready(function () {
        $('.pay').on('click', function() {
            var id   = $(this).data('id');
            var here = $(this);
            $.ajax({
                type   : 'GET',
                url    : 'subscriptions/pay/'+id,
                success: function(response) {
                    here.hide();
                    here.siblings().show();
                    $('#alert-div').parent().addClass('alert-success');
                    $('#alert-div').html('<li> Subscription updated Successfully </li>');
                    $('#alert-div').parent().show();
                }
            });
        });
    });
</script>
@endsection
