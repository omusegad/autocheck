<?php

namespace App\Http\Controllers;

use App\Models\Pillar;
use App\Models\KeyAction;
use Illuminate\Http\Request;
use App\Http\Requests\PillarRequest;

class PillarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pillars = Pillar::all();
        return view('pillar.index',compact('pillars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pillar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PillarRequest $request)
    {
        $validated = $request->validated();
        Pillar::create(
            [
                'name' => $validated['name']
            ]
        );
        KeyAction::create([
            'name' => $validated['keyAction']
        ]);
        return back()->with('message', "Pillar created successfully!");
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
        $pillar  = Pillar::findorFail($id);
        return view('pillars.edit', compact('pillar'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
