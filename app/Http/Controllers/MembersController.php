<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles =  Role::all();
        return view('members.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::findorFail($id);
        return view('members.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findorFail($id);
        return view('members.edit', compact('user'));
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
        $user = User::findorFail($id);
        $user->update([
            'name' =>  $request->name,
            'password' => $request->password ?  $user->password : Hash::make($request->password),
            'country_symbol' => strtoupper($request[0]),
            'country' => ucwords($request[1]),
            'phoneNumber' => $request['phoneNumber'],
            'date_signed_the_dcoc' => $request['date_signed_the_dcoc'],
            'date_signed_the_ja' => $request['date_signed_the_ja'],
            'stateDesignation' => $request['stateDesignation'],
            'national_focal_point' => $request['national_focal_point'],
            'job_title' =>$request['job_title'],
        ]);
        return back()->with('message', "Record updated successfully!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();

        return redirect()->route('members.index')->with('message', "Member deleted successfully!");
    }


}
