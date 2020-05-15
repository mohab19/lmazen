@extends('admin.layouts.head')
@section('StyleSheets')
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
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
                <h1 class="page-title"> {{ Lang::get('main.sectors') }}
                    <small>{{ Lang::get('main.create') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.sectors') }}</span></li>
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
                        <h5 class="card-header">Add New Sector</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" style="display: hidden;">
                                <ul id="notification" style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="new_sector">
                                @csrf
                                <input type="hidden" name="url" id="route" value="{{route('sectors.store')}}">
                                <select name="sector_devision" id="sector_devision" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled selected>Select Sector Devision: </option>
                                    @foreach($sectorDevisions as $devision)
                                    <option value="{{$devision}}">- {{$devision}}</option>
                                    @endforeach
                                </select>
                                <select name="sector_type" id="sector_type" disabled class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled selected>Select Sector Type: </option>
                                    @foreach($sectorTypes as $type)
                                        <option value="{{$type}}">- {{$type}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="sector_name" class="col-form-label">Sector Name</label>
                                    <input id="sector_name" name="name" type="text" class="form-control">
                                </div>
                                <div class="col-sm-6 pl-0" style="float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                        <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary">Cancel</span></a>
                                    </p>
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
