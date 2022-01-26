<?php

namespace App\Http\Controllers;

use App\Models\Pillar;
use App\Models\KeyAction;
use Illuminate\Http\Request;
use App\Models\PillarKeyAction;

class KeyActionControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyActions = KeyAction::all();
        return view("keyaction.index", compact("keyActions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pillar = Pillar::all();
        return view("keyaction.create", compact("pillar"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $keyActions = KeyAction::create(
            [
                "slug" => "place_holder",
                "description" => $request['description']
            ]
        );

        $action = KeyAction::find($keyActions->id);

        if(is_array($request['pillars']))
        foreach ($request['pillars'] as $item) {
            // echo $item;
            // $action->pillars()->attach($action->id);
            PillarKeyAction::create([
                'pillar_id' => $item,
                'key_action_id' => $action->id
            ]);
        }

        return back()->with('message', "Key Action created successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action  = KeyAction::findorFail($id);
        $country = Country::all();
        return view('keyaction.edit', compact('matrix','country'));
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
        $action = KeyAction::findorFail($id);
        $action->update([
            'country_id'  => $request->country_id,
            'matrixType'  => $request->matrixType,
            'year'  => $request->year,
            'status'  => $request->status,
            'priority'  => $request->priority,
            'description'  => $request->description,
        ]);
        return back()->with('message', "Key Action updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = KeyAction::findorFail($id);
        $action->delete();
        return back()->with('message', "Key Action deleted successfully!");
    }
}
