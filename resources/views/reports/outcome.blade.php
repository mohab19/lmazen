<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
        <thead>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.supplier')</th>
                <th>@lang('reports.amount')</th>
                <th>@lang('reports.paid')</th>
                <th>@lang('reports.date')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $key => $account)
                <tr>
                    <td>{{$account->id}}</td>
                    <td>{{$account->Supplier->name}}</td>
                    <td>{{$account->amount}}</td>
                    <td>{{$account->paid}}</td>
                    <td>{{$account->created_at}}</td>
                    <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                        <a class="btn btn-primary" href="{{URL('admin/suppliers/' . $account->supplier_id)}}" style="padding: 5px 10px;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.supplier')</th>
                <th>@lang('reports.amount')</th>
                <th>@lang('reports.paid')</th>
                <th>@lang('reports.date')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </tfoot>
    </table>
</div>
