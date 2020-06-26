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
                <h1 class="page-title"> {{ Lang::get('main.types') }}
                    <small>{{ Lang::get('main.view') }}</small>
                </h1>
                <a href="{{ URL( app()->getLocale() . '/admin/types/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">
                    {{ Lang::get('main.add_new') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL(' app()->getLocale() . /admin')}}" class="breadcrumb-link">
                                    {{ Lang::get('main.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.types') }}</span></li>
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
                                            <th>{{ Lang::get('main.product_name') }}</th>
                                            <th>{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.company_name') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($type->Product as $key => $product)
                                            <tr class="delete_{{$product->id}}">
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>
                                                    <a data-fancybox="images" href="{{asset('images/uploaded/' . $product->image)}}"><img class="img-fluid" src="{{asset('images/uploaded/' . $product->image)}}" width="180" length="150"></a>
                                                </td>
                                                <td>{{$product->Company->name}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{URL( app()->getLocale() . '/admin/products/' . $product->id)}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success" href="{{URL( app()->getLocale() . '/admin/products/' . $product->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$product->id}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.product_name') }}</th>
                                            <th>{{ Lang::get('main.image') }}</th>
                                            <th>{{ Lang::get('main.company_name') }}</th>
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
