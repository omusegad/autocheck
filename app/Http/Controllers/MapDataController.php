<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Pillar;
use App\Models\KeyAction;
use App\Models\MappedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MappDataRequest;

class MapDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MappedData::with('user','pillar')->get();
        return view('map.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pillars = Pillar::all();
        $keyactions = KeyAction::all();
        return view("map.create", compact('pillars','keyactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MappDataRequest $request)
    {
        $validated = $request->validated();
        $data = explode('-', $validated['country']);
        $validated['country_symbol'] = strtoupper($data[0]);
        $validated['country'] = ucwords($data[1]);
        $validated['user_id'] = Auth::id();

        MappedData::create($validated);
        return back()->with('message', "Country data created successfully!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MappedData::findorFail($id);
        return view("map.edit", compact('data'));
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
        $data = MappedData::findorFail($id);

        $data = explode('-', $request['country']);
        $matrix->update([
            'status'  => $request->status,
            'country_symbol' => strtoupper($data[0]) ??  $data->country_symbol,
            'country' => ucwords($data[1]) ??  $data->country,
            'user_id' => Auth::id()
        ]);

        return back()->with('message', "Country data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map = MappedData::findorFail($id);
        $map->delete();
        return back()->with('message', "Country data deleted successfully!");
    }
}
