<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Matrix;
use App\Models\Pillar;
use App\Models\Country;
use App\Models\KeyAction;
use Illuminate\Http\Request;
use App\Http\Requests\MatrixRequest;
use Illuminate\Support\Facades\Auth;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matrix = Matrix::all();
        $pillars = Pillar::all();
        return view("matrix.index", compact('matrix','pillars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        $pillars = Pillar::all();
        $keyactions = KeyAction::all();

        return view("matrix.create", compact('country','pillars','keyactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatrixRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Matrix::create($validated);
        return back()->with('message', "Matrix created successfully!");
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
        $matrix  = Matrix::findorFail($id);
        $country = Country::all();
        $pillars = Pillar::all();
        return view('matrix.edit', compact('matrix','country','pillars'));
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
        $matrix = Matrix::findorFail($id);
        $matrix->update([
            'user_id'  =>  Auth::id(),
            'pillar_id'  => $request->pillar_id,
            'key_action'  => $request->key_action,
            'status'  => $request->status,
            'priority'  => $request->priority,
        ]);
        return back()->with('message', "Matrix updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matrix = Matrix::findorFail($id);
        $matrix->delete();
        return back()->with('message', "Matrix deleted successfully!");
    }
}
