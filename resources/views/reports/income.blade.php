<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered second text-center" style="width:100%">
        <thead>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.name')</th>
                <th>@lang('reports.amount')</th>
                <th>@lang('reports.date')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $key => $report)
                <tr>
                    <td>{{$report->id}}</td>
                    <td>{{$report->Customer->name}}</td>
                    <td>{{$report->amount}}</td>
                    <td>{{$report->created_at}}</td>
                    <td class="@if(Lang::locale() == 'ar') text-left @else text-right @endif">
                        <a class="btn btn-primary" href="{{URL('admin/customers/' . $report->customer_id)}}" style="padding: 5px 10px;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>@lang('reports.id')</th>
                <th>@lang('reports.name')</th>
                <th>@lang('reports.amount')</th>
                <th>@lang('reports.date')</th>
                <th>@lang('reports.action')</th>
            </tr>
        </tfoot>
    </table>
</div>
