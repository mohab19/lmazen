@extends('admin.layouts.head')
@section('title')
    <title>@lang('types.types')</title>
@endsection
@section('content')
<div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h1 class="page-title">@lang('types.types')
                    <small>@lang('main.edit')</small>
                </h1>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL( app()->getLocale() . '/admin')}}" class="breadcrumb-link">@lang('main.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><span>@lang('types.types')</span></li>
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
                        <h5 class="card-header">@lang('types.edit')</h5>
                        <div class="card-body">
                            <div class="alert alert-dismissible" id="notification" style="display: none;">
                                <ul style="margin-bottom: 0;">

                                </ul>
                            </div>
                            <form id="form" action="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="route" value="{{route('types.update', [ app()->getLocale(), $type->id])}}">
                                <input type="hidden" id="form_name" value="Type" data-id="types">
                                <!--<select name="category_id" id="type_categories"  class="form-control" required>
                                    <option value="0" disabled selected>Select Category: </option>
                                    @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}" @if($type->category_id == $category->id) selected @endif>{{$category['name_'.Lang::locale()]}}</option>
                                    @endforeach
                                </select>-->
                                <div class="form-group">
                                    <label for="name_ar" class="col-form-label">@lang('types.name_ar')</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{$type->name_ar}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name_en" class="col-form-label">@lang('types.name_en')</label>
                                    <input type="text" name="name_en" class="form-control" value="{{$type->name_en}}" required>
                                </div>
                                <div class="col-sm-12 text-center pl-0 mt-3" style="float: right;">
                                    <button type="submit" class="btn btn-space btn-primary col-sm-4">@lang('main.edit')</button>
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
