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
                            <form id="new_company" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="URL" id="route" value="{{route('companies.store')}}">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Company Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Company E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Company Phone">
                                </div>
                                <select name="company_type" id="company_type" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled selected>Select Company Type: </option>
                                    @foreach($CompanyTypes as $companyType)
                                    <option value="{{$companyType}}">- {{$companyType}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Company Description" rows="4" cols="80"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="address" placeholder="Company Address" rows="4" cols="80"></textarea>
                                </div>
                                <div class="custom-file" style="margin-bottom: 20px;">
                                    <input type="file" name="image" onchange="readURLCompany(this)" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Company Image</label>
                                </div>
                                <div class="custom-file" style="margin-bottom: 20px;">
                                    <input type="file" name="video" onchange="readURLCompany(this)" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Company Video</label>
                                </div>
                                <div class="col-sm-6 pl-0" style="margin-top:20px;float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Save</button>
                                        <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary">Cancel</span></a>
                                    </p>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6 image" style="display: none;">
                                    <img src="" width="200" height="180" alt="">
                                </div>
                                <div class="col-md-6 video" style="display: none;">
                                    <iframe src="" width="240" height="180"></iframe>
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
