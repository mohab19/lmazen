<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerHistory;
use App\SupplierAccount;
use App\Report;
use App\Expense;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        switch ($request->type) {
            case 'income':
                $reports = CustomerHistory::whereBetween('created_at', [$request->time_from, $request->time_to])->where('paid', 1)->get();
                $html = \View::make('reports.income', compact('reports'))->render();
                $response['html'] = $html;

                $total = 0;
                foreach ($reports as $key => $row) {
                    $total += $row->amount;
                }
                $response['total'] = $total;

                $paid = 0;
                $accounts = SupplierAccount::whereBetween('created_at', [$request->time_from, $request->time_to])->get();
                foreach ($accounts as $key => $row) {
                    $paid += $row->paid;
                }

                $expenses = Expense::whereBetween('created_at', [$request->time_from, $request->time_to])->get();
                foreach ($expenses as $key => $row) {
                    $paid += $row->amount;
                }

                $response['outcome']  = $paid;
                $response['subtotal'] = $total - $paid;

                return $response;

                break;
            case 'outcome':
                $paid = 0;

                $accounts = SupplierAccount::whereBetween('created_at', [$request->time_from, $request->time_to])->get();
                foreach ($accounts as $key => $row) {
                    $paid += $row->paid;
                }

                $expenses = Expense::whereBetween('created_at', [$request->time_from, $request->time_to])->get();
                foreach ($expenses as $key => $row) {
                    $paid += $row->amount;
                }

                $response['total'] = $paid;
                $html = \View::make('reports.outcome', compact('accounts'))->render();
                $response['html'] = $html;

                return $response;

                break;
            case 'best_selling':
                $best = CustomerHistory::select(\DB::raw('sum(customer_histories.quantity) as sum'), 'customer_histories.product_id', 'products.name')->join('products', 'products.id', '=', 'customer_histories.product_id')->groupBy('customer_histories.product_id')->orderBy('sum', 'desc')->get();

                $html = \View::make('reports.best_selling', compact('best'))->render();

                $response['html'] = $html;

                return $response;
                break;
            default:
                // code...
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
