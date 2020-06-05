@extends('admin.layouts.head')

@section('title')
    <title>@lang('types.types')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('types.types')
                    <small>@lang('main.view')</small>
                </h1>
                <a href="{{ URL( app()->getLocale() . '/admin/types/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">
                    @lang('types.add_new')
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">
                                    @lang('main.dashboard')
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('types.types')</span></li>
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
                            <div class="alert alert-dismissible">
                                <ul id="alert-div" style="margin-bottom: 0px;">

                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.name') }}</th>
                                            <th>{{ Lang::get('main.category') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($types as $key => $type)
                                        <tr class="delete_{{$type->id}}">
                                            <td>{{$type->id}}</td>
                                            <td>{{$type['name_'.Lang::locale()]}}</td>
                                            <td>{{$type->Category['name_'.Lang::locale()]}}</td>
                                            <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                                                <a class="btn btn-primary" href="{{URL( app()->getLocale() . '/admin/types/' . $type->id)}}" style="padding: 5px 10px;">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success" href="{{URL( app()->getLocale() . '/admin/types/' . $type->id . '/edit')}}" style="padding: 5px 10px;">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <span class="delete_this btn btn-danger" data-id="{{$type->id}}" data-type="Type" data-url="types" style="padding: 5px 10px;">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.name') }}</th>
                                            <th>{{ Lang::get('main.category') }}</th>
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
