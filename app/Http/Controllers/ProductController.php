<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\SupplierAccount;
use App\ProductHistory;
use App\Customer;
use App\Supplier;
use App\Product;
use App\Brand;
use App\Models;
use App\Type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products  = Product::all();
        $customers = Customer::all();
        $brands    = Brand::all();
        $types     = Type::all();
        return view('products.index', compact('products', 'customers', 'brands', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $types     = Type::all();
        $brands    = Brand::all();
        $suppliers = Supplier::all();
        $models    = Models::all();
        $products  = Product::all();
        return view('products.create', compact('types', 'brands', 'suppliers','models', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($lang, ProductRequest $request) {

        if($request->Product_id == 0) {
            $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images/products'), $imageName);
            $product = Product::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'image'         => $imageName,
                'brand_id'      => $request->brand_id,
                'type_id'       => $request->type_id,
                'model_id'      => $request->model_id,
                'port_no'       => $request->port_no,
                'buying_price'  => $request->buying_price,
                'supplier_id'   => $request->supplier_id,
            ]);

            $productHistory = ProductHistory::create([
                'product_id'    => $product->id,
                'selling_price' => $request->selling_price,
                'quantity'      => $request->quantity
            ]);
        } else {
            $product = ProductHistory::create([
                'product_id'    => $request->Product_id,
                'selling_price' => $request->selling_price,
                'quantity'      => $request->quantity
            ]);
        }

        $brand = Brand::where('id', $request->brand_id)->first();

        $account = SupplierAccount::where('supplier_id', $request->supplier_id)->latest('created_at')->first();

        if(date('Y-m-d', strtotime($request->created_at)) == date('Y-m-d')) {
            $account->update([
                'description' =>  $account->description . ' ' . $request->quantity . ' ' . $request->name . ' ' . $brand->name_en . ' <br>',
                'amount' => $account->amount + ($request->quantity * $request->buying_price),
            ]);
        } else {
            $account = SupplierAccount::create([
                'supplier_id' => $request->supplier_id,
                'description' => $request->quantity . ' ' . $request->name . ' ' . $brand->name_en . ' <br>',
                'amount'      => ($request->quantity * $request->buying_price),
                'paid'        =>  0,
                'remain'      => ($request->quantity * $request->buying_price),
            ]);
        }

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
    public function show($lang, Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Product $product) {
        $types     = Type::all();
        $brands    = Brand::all();
        $models    = Models::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('types', 'brands', 'suppliers', 'models', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($lang, ProductRequest $request, Product $product) {
        $data = $request->input();

        if($request->hasFile('image')) {
            $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images/uploaded'), $imageName);
        } else {
            $product = Product::find($id);
            $imageName = $product->image;
        }

        $product->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imageName,
            'brand_id'      => $request->brand_id,
            'model_id'      => $request->model_id,
            'type_id'       => $request->type_id,
            'port_no'       => $request->port_no,
            'buying_price'  => $request->buying_price,
            'supplier_id'   => $request->supplier_id,
        ]);

        $productHistory = ProductHistory::where('product_id', $product->id)->orderBy('created_at', 'desc')->first();

        $productHistory->update([
            'selling_price' => $request->selling_price,
            'quantity'      => $request->quantity
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
    public function destroy($lang, Product $product) {
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

    public function getProducts(Request $request) {
        if($request->type == null) {
            $products = Product::select('products.*')
                               ->join('brands', 'brands.id', '=', 'products.brand_id')
                               ->join('types', 'types.id', '=', 'products.type_id')
                               ->where('brands.name_ar', $request->brand)
                               ->orWhere('brands.name_en', $request->brand)
                               ->get();
        } elseif($request->brand == null) {
            $products = Product::select('products.*')
                               ->join('brands', 'brands.id', '=', 'products.brand_id')
                               ->join('types', 'types.id', '=', 'products.type_id')
                               ->where('types.name_ar', $request->type)
                               ->orWhere('types.name_en', $request->type)
                               ->get();
        } else {
            $products = Product::select('products.*')
                               ->join('brands', 'brands.id', '=', 'products.brand_id')
                               ->join('types', 'types.id', '=', 'products.type_id')
                               ->where('brands.name_ar', $request->brand)
                               ->orWhere('brands.name_en', $request->brand)
                               ->where('types.name_ar', $request->type)
                               ->orWhere('types.name_en', $request->type)
                               ->get();
        }

        $customers = Customer::all();
        $brands    = Brand::all();
        $types     = Type::all();
        return view('products.index', compact('products', 'customers', 'brands', 'types'));
    }
}
