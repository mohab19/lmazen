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
        $sectors       = Sector::where('sector_devision', 'CSI')->get();
        $products      = Product::where('new_product', 1)->get();
        $productsCount = Product::count();
        $projects      = Project::where('new_projects', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $news          = News::where('new_news', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $articles      = Article::orderBy('created_at', 'desc')->limit(2)->get();
        $sliders       = Slider::where('type', 'products')->get();
        $sponsors      = Sponsor::all();
        return view('index', compact('sectors', 'products', 'news', 'projects', 'articles', 'productsCount', 'sliders', 'sponsors'));
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
