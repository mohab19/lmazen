@extends('admin.layouts.head')

@section('title')
    <title>{{ Lang::get('main.home_page_title') }}</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title"> {{ Lang::get('main.companies') }}
                    <small>{{ Lang::get('main.view') }}</small>
                </h1>
                <a href="{{ URL('admin/companies/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">
                    {{ Lang::get('main.add_new') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">
                                    {{ Lang::get('main.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.companies') }}</span></li>
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
                                            <th>{{ Lang::get('main.name') }}</th>
                                            <th>{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.video') }}</th>
                                            <th>{{ Lang::get('main.company_type') }}</th>
                                            <th>{{ Lang::get('main.description') }}</th>
                                            <th>{{ Lang::get('main.address') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($companies as $key => $company)
                                            <tr class="delete_{{$company->id}}">
                                                <td>{{$company->id}}</td>
                                                <td>{{$company->name}}</td>
                                                <td>
                                                    <a data-fancybox="images" href="{{asset('images/uploaded/' . $company->image)}}"><img class="img-fluid" src="{{asset('images/uploaded/' . $company->image)}}" width="150" height="100"></a>
                                                </td>
                                                <td>
                                                    @if($company->video != '')
                                                    <video controls width="240" height="180">
                                                        <source src="{{asset('videos/uploaded/'. $company->video)}}">
                                                    </video>
                                                    @else
                                                    No Video
                                                    @endif
                                                </td>
                                                <td>{{$company->company_type}}</td>
                                                <td>{{$company->description}}</td>
                                                <td>{{$company->address}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{URL('admin/companies/' . $company->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$company->id}}" data-type="Company" data-url="companies" style="padding: 5px 10px;">
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
                                            <th>{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.video') }}</th>
                                            <th>{{ Lang::get('main.company_type') }}</th>
                                            <th>{{ Lang::get('main.description') }}</th>
                                            <th>{{ Lang::get('main.address') }}</th>
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
