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
                    <small>{{ Lang::get('main.view') }}</small>
                </h1>
                <a href="{{ URL('admin/sectors/create') }}" class="btn btn-primary" id="sample_editable_1_new" style="float: right;">
                    {{ Lang::get('main.add_new') }}
                    <i class="fa fa-plus"></i>
                </a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{URL('/admin')}}" class="breadcrumb-link">
                                    {{ Lang::get('main.dashboard') }}
                                </a>
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
                                            <th>{{ Lang::get('main.category_name') }}</th>
                                            <th>{{ Lang::get('main.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sector->Categories as $key => $category)
                                            <tr class="delete_{{$sector->id}}">
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{URL('admin/categories/' . $category->id)}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success" href="{{URL('admin/categories/' . $category->id . '/edit')}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <span class="delete_this btn btn-danger" data-id="{{$category->id}}" style="padding: 5px 10px;">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ Lang::get('main.id') }}</th>
                                            <th>{{ Lang::get('main.category_name') }}</th>
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
@section('JavaScript')
<!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script>
    $(document).ready(function () {
        var token = "{{ csrf_token() }}";

        $(document).on('click', '.delete_this', function (event) {
            if (confirm("Are you sure you want to delete this Category? This will delete All the Types Under it!")) {
                var deleted_id = $(this).attr("data-id");
                event.preventDefault();
                $.ajax({
                    type: "DELETE",
                    url: "{{ URL('admin/categories') }}/" + deleted_id,
                    data: {_method: 'DELETE', _token: token, "id": deleted_id},
                    success: function (response) {
                        $(".delete_"+deleted_id).remove();
                        $("#alert-div").parent().addClass('alert-success');
                        $('#alert-div').html('<li> Category Deleted successfully! </li>');
                    }
                });
            }
        });
    });
    </script>
@endsection
