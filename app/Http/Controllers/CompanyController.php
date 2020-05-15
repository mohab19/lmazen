<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Company;
use App\Catalog;
use App\Product;
use App\Event;
use App\News;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $CompanyTypes = Company::getPossibleTypes();

        return view('companies.create', compact('CompanyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request) {
        $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
        request()->image->move(public_path('images/uploaded'), $imageName);

        if($request->hasFile('video')) {
            $videoName = time().'_'.$request->input('name').'.'.$request->file('video')->getClientOriginalExtension();
            request()->video->move(public_path('videos/uploaded'), $videoName);
        } else {
            $videoName = '';
        }

        $data = $request->input();

        $company = Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $imageName,
            'video' => $videoName,
            'description' => $data['description'],
            'address' => $data['address'],
            'company_type' => $data['company_type']
        ]);

        if($company)
            return response(200);
        else
            return response(500);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $company = Company::find($id);
        $CompanyTypes = Company::getPossibleTypes();

        return view('companies.edit', compact('company', 'CompanyTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request) {
        $company = Company::find($request->id);
        if($request->hasFile('image')) {
            $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images/uploaded'), $imageName);
        } else {
            $imageName = $company->image;
        }

        if($request->hasFile('video')) {
            $videoName = time().'_'.$request->input('name').'.'.$request->file('video')->getClientOriginalExtension();
            request()->video->move(public_path('videos/uploaded'), $videoName);
        } else {
            $videoName = $company->video;
        }

        $data = $request->input();

        $company = Company::where('id', $data['id'])->update([
            'name' => $data['name'],
            'image' => $imageName,
            'video' => $videoName,
            'description' => $data['description'],
            'address' => $data['address'],
            'company_type' => $data['company_type']
        ]);

        if($company)
            return response(200);
        else
            return response(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $company = Company::find($id);
        $company->delete();

        if($company)
            return response(200);
        else
            return response(500);
    }

    public function Companies() {
        $companies = Company::all();
        return view('companies.companies', compact('companies'));
    }

    public function Consultancies() {
        $companies = Company::where('company_type', 'contractor')->get();
        return view('companies.companies', compact('companies'));
    }

    public function Constructors() {
        $companies = Company::where('company_type', 'consultancy')->get();
        return view('companies.companies', compact('companies'));
    }

    public function products(Company $company) {
        $products = Product::where('company_id', $company->id)->paginate(20);
        return view('companies.products', compact('products', 'company'));
    }

    public function catalogs(Company $company) {
        $catalogs = Catalog::where('company_id', $company->id)->paginate(20);
        return view('companies.catalogs', compact('catalogs', 'company'));
    }

    public function news(Company $company) {
        $allNews = News::where('company_id', $company->id)->paginate(20);
        return view('companies.news', compact('allNews', 'company'));
    }

    public function events(Company $company) {
        $events = Event::where('company_id', $company->id)->paginate(20);
        return view('companies.events', compact('events', 'company'));
    }
}
