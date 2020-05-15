<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Requests\SectorRequest;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $sectors = Sector::all();
        return view('sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sectorTypes = Sector::getPossibleTypes();
        $sectorDevisions = Sector::getPossibleDevisions();

        return view('sectors.create', compact('sectorTypes', 'sectorDevisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request) {
        $sector = Sector::create([
            'name' => $request->input('name'),
            'sector_devision' => $request->input('sector_devision'),
            'sector_type' => $request->input('sector_type'),
        ]);

        if($sector)
            return response(200);
        else
            return response(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $sector = Sector::find($id);
        return view('sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $sector = Sector::find($id);
        $sectorTypes = Sector::getPossibleTypes();
        $sectorDevisions = Sector::getPossibleDevisions();
        return view('sectors.edit', compact('sector', 'sectorDevisions', 'sectorTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request) {
        $sector = Sector::where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'sector_devision' => $request->input('sector_devision'),
            'sector_type' => $request->input('sector_type')
        ]);

        if($sector)
            return response(200);
        else
            return response(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $sector = Sector::find($id);
        $sector = $sector->delete();
        if($sector)
            return response(200);
        else
            return response(500);
    }
}
