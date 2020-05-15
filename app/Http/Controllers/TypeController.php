<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Sector;
use App\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sectors = Sector::all();
        return view('types.create', compact('types', 'categories', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request) {
        $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
        request()->image->move(public_path('images/uploaded'), $imageName);

        $type = Type::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);

        if($type)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $type = Type::find($id);
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $type = Type::find($id);
        $categories = Category::all();
        $sectors = Sector::all();

        return view('types.edit', compact('type', 'categories','sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id) {
        $type = Type::find($id);
        $data = $request->input();
        if($request->hasFile('image')) {
            $imageName = time().'_'.$request->input('name').'.'.$request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('images/uploaded'), $imageName);
        } else {
            $imageName = $type->image;
        }

        $type = Type::where('id', $id)->update([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'image' => $imageName
        ]);

        if($type)
            return response(200);
        else
            return response(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $type = Type::find($id);
        $products = Product::where('type_id', $id)->delete();
        $type->delete();

        if($type)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTypes($id) {
        $types = Type::where('category_id', $id)->get();
        return $types;
    }
}
