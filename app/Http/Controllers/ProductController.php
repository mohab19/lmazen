<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\Sector;
use App\Type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sectors = Sector::all();
        $companies = Company::all();

        return view('products.create', compact('sectors', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {
        $data = $request->input();
        $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
        request()->image->move(public_path('images/uploaded'), $imageName);

        $product = Product::create([
            'name' => $data['name'],
            'image' => $imageName,
            'description' => $data['description'],
            'type_id' => $data['type_id'],
            'company_id' => $data['company_id'],
            'new_product' => $data['new_product'] != null ? $data['new_product'] : 0
        ]);

        if($product)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $types = Type::all();
        $companies = Company::all();
        $product = Product::find($id);

        return view('products.edit', compact('types', 'companies', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id) {
        $data      = $request->input();
        if($request->hasFile('image')) {
            $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images/uploaded'), $imageName);
        } else {
            $product = Product::find($id);
            $imageName = $product->image;
        }

        $product = Product::where('id', $id)->update([
            'name'        => $data['name'],
            'image'       => $imageName,
            'description' => $data['description'],
            'type_id'     => $data['type_id'],
            'company_id'  => $data['company_id'],
            'new_product' => $data['new_product'] != null ? $data['new_product'] : 0
        ]);

        if($product)
            return response(200);
        else
            return response(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        if($product)
            return response(200);
        else
            return response(500);
    }

    public function products($id) {
        $products = Product::where('type_id', $id)->paginate(20);
        $productsCount = Product::count();
        $type = Type::find($id);
        return view('products.products', compact('products', 'type', 'productsCount'));
    }

    public function singleView($id) {
        $product = Product::find($id);
        return view('products.product', compact('product'));
    }

    public function productsMenu() {
        $projectsTypes = Sector::where('sector_type', 'products')->get();
        $html= '<ul>';
        foreach ($projectsTypes as $key => $type) {
            $html .= '<li>' . $type->name . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
