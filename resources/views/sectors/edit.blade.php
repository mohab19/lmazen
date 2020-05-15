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
                    <small>{{ Lang::get('main.edit') }}</small>
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
                        <h5 class="card-header">Edit Existing Sector</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" style="display: hidden;">
                                <ul id="notification" style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="edit_sector">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="url" id="route" value="{{url('admin/sectors')}}">
                                <input type="hidden" id="sector_id" name="id" value="{{$sector->id}}">
                                <select name="sector_devision" id="sector_devision" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled>Select Sector Devision: </option>
                                    @foreach($sectorDevisions as $devision)
                                    <option value="{{$devision}}"  @if($sector->sector_devision == $devision) selected @endif>- {{$devision}}</option>
                                    @endforeach
                                </select>
                                <select name="sector_type" id="sector_type" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled>Select Sector Type: </option>
                                    @foreach($sectorTypes as $type)
                                        <option value="{{$type}}" @if($sector->sector_type == $type) selected @endif>- {{$type}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="sector_name" class="col-form-label">Sector Name</label>
                                    <input type="text" id="sector_name" name="name" class="form-control" value="{{$sector->name}}">
                                </div>
                                <div class="col-sm-6 pl-0" style="float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Update</button>
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
