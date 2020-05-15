@extends('admin.layouts.head')
@section('title')
    <title>{{ Lang::get('main.products') }}</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title"> {{ Lang::get('main.products') }}
                    <small>{{ Lang::get('main.create') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ Lang::get('main.products') }}</span></li>
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
                        <h5 class="card-header">Edit Product {{$product->name}}</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" style="display: hidden;">
                                <ul id="notification" style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="edit_product" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="url" id="route" value="{{URL('admin/products')}}">
                                <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                <select name="type_id" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled>Select Type: </option>
                                    @foreach($types as $type)
                                    <option value="{{$type->id}}" @if($product->type_id == $type->id) selected @endif>- {{$type->name}}</option>
                                    @endforeach
                                </select>
                                <select name="company_id" class="form-control" style="margin-bottom: 20px;" required>
                                    <option value="0" disabled>Select Company: </option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}" @if($product->company_id == $company->id) selected @endif>- {{$company->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
                                </div>
                                <input type="hidden" name="old_image" value="{{$product->image}}">
                                <div class="custom-file" style="margin-bottom: 20px;">
                                    <input type="file" name="image" onchange="readURL(this)" class="custom-file-input" id="customFile" value="{{URL('images/uploaded') . '/' . $product->image}}">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" rows="4" cols="80">{{$product->description}}</textarea>
                                </div>
                                <div class="form-check" style="margin-bottom: 20px;">
                                    <input class="form-check-input" type="checkbox" name="new_product" id="new_product"  @if($product->new_product == 1) checked @endif value="1">
                                    <label class="form-check-label" for="new_product">
                                        Make this appear in the New Products list
                                    </label>
                                </div>
                                <div class="col-sm-6 pl-0" style="margin-top:20px;float: right;">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Save</button>
                                        <button class="btn btn-space btn-secondary">Cancel</button>
                                    </p>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6 image">
                                    <img src="{{URL('images/uploaded') . '/' . $product->image}}" width="200" height="180" alt="">
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
