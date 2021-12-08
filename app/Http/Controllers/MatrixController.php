<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use Illuminate\Http\Request;
use App\Http\Requests\MatrixRequerst;

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
        return view("matrix.index", compact('matrix'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("matrix.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatrixRequerst $request)
    {
        $validated = $request->validated();
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
        $matrix = Matrix::findorFail($id);
        return view('matrix.edit', compact('matrix'));
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
            'country_id'  => $request->country_id,
            'matrixType'  => $request->matrixType,
            'year'  => $request->year,
            'status'  => $request->status,
            'priority'  => $request->priority,
            'description'  => $request->description,
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
        return back()->with('message', "matrix deleted successfully!");
    }
}