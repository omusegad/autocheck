<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Pillar;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map_data = Matrix::all();
        return view("countries.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("countries.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $validated = $request->validated();
        Country::create($validated);
        return back()->with('message', "Country created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);

        $matrix = Matrix::where('country_symbol', $id)->get();
        return view('countries.show', compact('matrix'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findorFail($id);
        return view('countries.edit', compact('country'));
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
        $country = Country::findorFail($id);
        $country->update([
            'name' => $request->name,
        ]);
        return back()->with('message', "Country updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Country::findorFail($id);
        $branch->delete();
        return back()->with('message', "country deleted successfully!");
    }

    public function symbol($id)
    {
       // dd($id);
        $pillars = Pillar::all();
        $data = Matrix::where('country_symbol', $id)->get();
        return view('countries.show', compact('data','pillars'));
    }
}
