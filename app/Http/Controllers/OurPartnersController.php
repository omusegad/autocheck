<?php

namespace App\Http\Controllers;

use App\Models\OurPartner;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\OurPartnerRequest;

class OurPartnersController extends Controller
{

    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourpartners = OurPartner::all();
        return view("ourpatners.index",compact('ourpartners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("ourpatners.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //OurPartnerRequest
    public function store(Request $request)
    {
        $validated = $request->all();
       //dd( $validated);

        if ($validated['partner_logo']) {
            $image = $request->file('partner_logo');
            $name = Str::slug($validated['partner_name']).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension() ;
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $validated['partner_logo'] = $filePath;

       // dd($validated);

         OurPartner::create($validated);

        return back()->with('message', "Partner created successfully!");
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
        $ourpartners  = OurPartner::findorFail($id);
        return view('ourpatners.edit', compact('ourpartners'));
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
        $ourpartners  = OurPartner::findorFail($id);
        if ($request->file('partner_logo')) {
            $image = $request->file('partner_logo');
            $name = Str::slug($request['partner_name']).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension() ;
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $ourpartners->update([
            'partner_name' => $request->partner_name ?? $ourpartners->partner_name,
            'description' => $request->description ?? $ourpartners->description,
            'specialization_area' => $request->specialization_area ?? $ourpartners->specialization_area,
            'partner_logo' => $filePath ?? $ourpartners->partner_logo,
        ]);
        return back()->with('message', "Partner updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourpartner = OurPartner::findorFail($id);
        $ourpartner->delete();
        return back()->with('message', "Partner deleted successfully!");
    }
}
