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
                    <small>{{ Lang::get('main.create') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
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
                        <h5 class="card-header">Add New Type</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" style="display: hidden;">
                                <ul id="notification" style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="new_type" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="url" id="route" value="{{route('types.store')}}">
                                <select class="form-control" name="sector_id" id="type_sector_id" data-url="{{URL('admin/categories/get_categories')}}" required style="margin-bottom: 20px;">
                                    <option value="0" disabled selected>Select Sector: </option>
                                    @foreach($sectors as $sector)
                                    <option value="{{$sector->id}}">- {{$sector->name}}</option>
                                    @endforeach
                                </select>
                                <select name="category_id" id="type_categories" disabled class="form-control" required>
                                    <option value="0" disabled selected>Select Category: </option>

                                </select>
                                <div class="form-group">
                                    <label for="sector_name" class="col-form-label">Type Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" onchange="readURL(this)" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="col-sm-6 pl-0" style="margin-top:20px;float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Save</button>
                                        <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary">Cancel</span></a>
                                    </p>
                                </div>
                            </form>
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-6 image" style="display: none;">
                                    <img src="" width="200" height="180" alt="">
                                </div>
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
