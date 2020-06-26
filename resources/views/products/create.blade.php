@extends('admin.layouts.head')
@section('title')
    <title>@lang('products.products')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('products.products')
                    <small>{{ Lang::get('main.create') }}</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">{{ Lang::get('main.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('products.products')</span></li>
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
                        <h5 class="card-header">@lang('products.add_new')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible"  id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form" class="row" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="route" value="{{route('products.store', app()->getLocale())}}">
                                <input type="hidden" id="form_name" value="Product" data-id="products">
                                <div class="form-group col-sm-12 mb-3">
                                    <select name="Product_id" class="form-control" id="existed_product" required>
                                        <option value="0" disabled selected>@lang('products.existed_product')</option>
                                        @foreach($products as $key => $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select name="type_id" class="form-control" required>
                                        <option value="0" disabled selected>Select Type: </option>
                                        @foreach($types as $key => $type)
                                        <option value="{{$type->id}}">{{$type['name_'.Lang::locale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select name="brand_id" class="form-control" required>
                                        <option value="0" disabled selected>Select Brand: </option>
                                        @foreach($brands as $key => $brand)
                                        <option value="{{$brand->id}}">{{$brand['name_'.Lang::locale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name" class="col-form-label">@lang('products.name')</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6 mt-4">
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="0" disabled selected>Select Supplier: </option>
                                        @foreach($suppliers as $key => $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="address" class="col-form-label">@lang('products.description')</label>
                                    <textarea name="description" rows="3" cols="80" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="port_no" class="col-form-label">@lang('products.port_no')</label>
                                    <input type="text" name="port_no" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="buying_price" class="col-form-label">@lang('products.buying_price')</label>
                                    <input type="number" min="0" name="buying_price" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="selling_price" class="col-form-label">@lang('products.selling_price')</label>
                                    <input type="number" min="0" name="selling_price" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="quantity" class="col-form-label">@lang('products.quantity')</label>
                                    <input type="number" min="0" name="quantity" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label" for="customFile">@lang('products.image')</label>
                                    <input type="file" name="image" onchange="readURL(this)" class="form-control" id="customFile">
                                </div>

                                <div class="form-group col-sm-6 mt-4">
                                    <div class="image" style="display: none;">
                                        <img src="" width="200" height="180" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 text-center mt-3">
                                    <button type="submit" class="btn btn-space btn-primary col-sm-4">@lang('main.save')</button>
                                    <a href="{{url()->previous()}}"><span class="btn btn-space btn-secondary col-sm-4">@lang('main.cancel')</span></a>
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
