<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Matrix;
use App\Models\Pillar;
use App\Models\Country;
use App\Models\KeyAction;
use Illuminate\Http\Request;
use App\Mail\MatrixNotification;
use App\Http\Requests\MatrixRequest;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Mail;
use Mail;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matrix = Matrix::latest()->orderBy('created_at')->get();
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
        $data = explode('-', $validated['country']);
        $validated['country_symbol'] = strtoupper($data[0]);
        $validated['country'] = ucwords($data[1]);
        $validated['user_id'] = Auth::id();

        $data = Matrix::create($validated);
        if($data){
           Mail::to("norbert@aftersix.co.ke")->send(new MatrixNotification($data));
        }
       
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
        $pillars = Pillar::all();
        return view('matrix.edit', compact('matrix','pillars'));
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
        $data = explode('-', $request['country']);
        $matrix->update([
            'user_id'  =>  Auth::id(),
            'pillar_id'  => $request->pillar_id,
            'key_action'  => $request->key_action,
            'status'  => $request->status,
            'priority'  => $request->priority ?? $matrix->priority,
            'country_symbol' => strtoupper($data[0]) ??  $matrix->country_symbol,
            'country' => ucwords($data[1]) ??  $matrix->country,
            'user_id' => Auth::id()
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
