@extends('admin.layouts.head')

@section('title')
    <title>{{ Lang::get('main.requests') }}</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title"> {{ Lang::get('main.requests') }}
                    <small>{{ Lang::get('main.view') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">
                                    {{ Lang::get('main.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.requests') }}</span></li>
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
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.type') }}</th>
                                            <th>{{ Lang::get('main.user') }}</th>
                                            <th>{{ Lang::get('main.description') }}</th>
                                            <th>{{ Lang::get('main.get_price') }}</th>
                                            <th>{{ Lang::get('main.recieve_docs') }}</th>
                                            <th>{{ Lang::get('main.phone_contact') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $key => $request)
                                            <tr class="delete_{{$request->id}}">
                                                <td>{{$request->id}}</td>
                                                <td>{{$request->request_type}}</td>
                                                <td>{{$request->User->name}}</td>
                                                <td>{{$request->request_description}}</td>
                                                <td>@if($request->get_price) YES @else NO @endif</td>
                                                <td>@if($request->recieve_docs) YES @else NO @endif</td>
                                                <td>@if($request->phone_contact) YES @else NO @endif</td>
                                                <td>
                                                    <a class="btn btn-success" href="#" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$request->id}}" data-type="Request" data-url="requests" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.type') }}</th>
                                            <th>{{ Lang::get('main.user') }}</th>
                                            <th>{{ Lang::get('main.description') }}</th>
                                            <th>{{ Lang::get('main.get_price') }}</th>
                                            <th>{{ Lang::get('main.recieve_docs') }}</th>
                                            <th>{{ Lang::get('main.phone_contact') }}</th>
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
