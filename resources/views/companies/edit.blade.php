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
                            <form id="edit_company" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="URL" id="route" value="{{URL('admin/companies')}}">
                                <input type="hidden" name="id" id="id" value="{{$company->id}}">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{$company->name}}" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" value="{{$company->email}}" placeholder="Company E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="{{$company->phone}}" placeholder="Company Phone">
                                </div>
                                <select name="company_type" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled>Select Company Type: </option>
                                    @foreach($CompanyTypes as $companyType)
                                    <option value="{{$companyType}}" @if($company->company_type == $companyType) selected @endif>- {{$companyType}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" rows="4" cols="80">{{$company->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="address" rows="4" cols="80">{{$company->address}}</textarea>
                                </div>
                                <input type="hidden" name="old_image" value="{{$company->image}}">
                                <div class="custom-file" style="margin-bottom: 20px;">
                                    <input type="file" name="image" onchange="readURLCompany(this)" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                </div>
                                <div class="custom-file" style="margin-bottom: 20px;">
                                    <input type="file" name="video" onchange="readURLCompany(this)" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose Video</label>
                                </div>
                                <div class="col-sm-6 pl-0" style="margin-top:20px;float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Edit</button>
                                        <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary">Cancel</span></a>
                                    </p>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6 image">
                                    <img src="{{asset('images/uploaded/') . '/' . $company->image}}" width="200" height="180" alt="">
                                </div>
                                <div class="col-md-6 video">
                                    <iframe src="{{asset('videos/uploaded/') . '/' . $company->video}}" width="240" height="180"></iframe>
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
