<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
        <thead>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.product')</th>
                <th>@lang('reports.quantity')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($best as $key => $product)
                <tr>
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->sum}}</td>
                    <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                        <a class="btn btn-primary" href="{{URL( app()->getLocale() . '/admin/products/' . $product->product_id)}}" style="padding: 5px 10px;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.product')</th>
                <th>@lang('reports.quantity')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </tfoot>
    </table>
</div>
