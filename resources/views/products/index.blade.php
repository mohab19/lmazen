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
                    <small>@lang('main.view')</small>
                </h1>
                @auth('admin')
                <a href="{{ URL('admin/products/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">
                    @lang('products.add_new')
                    <i class="fa fa-plus"></i>
                </a>
                @endauth
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">
                                    @lang('main.dashboard')
                                </a>
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
                        <div class="card-body">
                            <div class="alert">
                                <ul id="alert-div" style="margin-bottom: 0px;">

                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('products.id')</th>
                                            <th>@lang('products.name')</th>
                                            <th>@lang('products.image')</th>
                                            <th>@lang('products.description')</th>
                                            <th>@lang('products.supplier')</th>
                                            <th>@lang('products.brand')</th>
                                            <th>@lang('products.type')</th>
                                            <th>@lang('products.port_no')</th>
                                            @auth('admin')
                                            <th>@lang('products.buying_price')</th>
                                            @endauth
                                            <th>@lang('products.selling_price')</th>
                                            <th>@lang('products.quantity')</th>
                                            <th>@lang('products.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key => $product)
                                            <tr class="delete_{{$product->id}}">
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>
                                                    <a data-fancybox="images" href="{{asset('images/products/' . $product->image)}}"><img class="img-fluid" src="{{asset('images/products/' . $product->image)}}" width="200" length="170"></a>
                                                </td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->Supplier->name}}</td>
                                                <td>{{$product->Brand['name_'.Lang::locale()]}}</td>
                                                <td>{{$product->Type['name_'.Lang::locale()]}}</td>
                                                <td>{{$product->port_no}}</td>
                                                <td>{{$product->buying_price}}</td>
                                                @auth('admin')
                                                <td>{{$product->selling_price}}</td>
                                                @endauth
                                                <td>{{$product->quantity}}</td>
                                                <td>
                                                    @auth('admin')
                                                    <a class="btn btn-success" href="{{URL('admin/products/' . $product->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$product->id}}" data-type="Product" data-url="products" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    @endauth
                                                    <span class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModal" data-id="{{$product->id}}" onclick="fill_id(this)"><i class="fas fa-money-bill-alt"></i></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>@lang('products.id')</th>
                                            <th>@lang('products.name')</th>
                                            <th>@lang('products.image')</th>
                                            <th>@lang('products.description')</th>
                                            <th>@lang('products.supplier')</th>
                                            <th>@lang('products.brand')</th>
                                            <th>@lang('products.type')</th>
                                            <th>@lang('products.port_no')</th>
                                            @auth('admin')
                                            <th>@lang('products.buying_price')</th>
                                            @endauth
                                            <th>@lang('products.selling_price')</th>
                                            <th>@lang('products.quantity')</th>
                                            <th>@lang('products.action')</th>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('products.sell_customer')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert" id="sell-alert" style="display: none;">
                                    <ul style="margin-bottom: 0px;">

                                    </ul>
                                </div>
                                <input type="hidden" name="product_id" id="product_id" value="">
                                <div class="form-group">
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="0" disabled>Select User: </option>
                                        @foreach($customers as $key => $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-form-label">@lang('products.quantity')</label>
                                    <input type="number" min="1"  name="quantity" id="quantity" class="form-control" value="1" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="sell_product">@lang('products.sell')</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('products.close')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
