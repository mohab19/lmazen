<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Catalog;
use App\Product;
use App\Project;
use App\Sponsor;
use App\Sector;
use App\Slider;
use App\News;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $type = $request->searchType;
        if($type == 'products') {
            $results = Product::where('name', 'like', '%'.$request->Terms.'%')->paginate(20);
        } elseif($type == 'catalogs') {
            $results = Catalog::where('name', 'like', '%'.$request->Terms.'%')->paginate(20);
        } elseif($type == 'projects') {
            $results = Project::where('name', 'like', '%'.$request->Terms.'%')->paginate(20);
        } elseif($type == 'news') {
            $results = News::where('title', 'like', '%'.$request->Terms.'%')->paginate(20);
        }

        return view('search_results', compact('type', 'results'));
    }
}
