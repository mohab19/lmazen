<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Sector;
use App\Type;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
         $categories = Category::all();
         return view('categories.index', compact('categories'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sectors = Sector::all();
        return view('categories.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {
        $data = $request->input();
        $category = Category::create($data);
        if($category)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $sectors = Sector::all();
        $category = Category::find($id);
        return view('categories.edit', compact('sectors', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->input();
        $category = Category::where('id', $id)->update([
            'sector_id' => $data['sector_id'],
            'name' => $data['name'],
        ]);

        if($category)
            return response(200);
        else
            return response(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::find($id);
        $category = $category->delete();
        if($category)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Category($id) {
        $category = Category::find($id);
        return view('categories.category', compact('types', 'category'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories($id) {
        $categories = Category::where('sector_id', $id)->get();
        return $categories;
    }
}
