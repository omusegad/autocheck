<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;

class ResourcesController extends Controller
{

    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view("resource.index", compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("resource.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->all();
        if ($validated['upload_doc']) {
            $image = $request->file('upload_doc');
            $name = Str::slug($validated['title']).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension() ;
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $validated['dockLink'] = $filePath;
        //dd($validated);

        // Persist record to database
        Resource::create($validated);

        return back()->with('message', "Resource created successfully!");
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
        $resource  = Resource::findorFail($id);
        return view('resource.edit', compact('resource'));
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
        $resource = Resource::findorFail($id);
        //import pdf 
        $matrix->update([
            'title'  => $request->title,
            'dockLink'  => $request->key_action,
            'doc_cat'  => $request->doc_cat,
        ]);
     
        return back()->with('message', "Resource updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matrix = Resource::findorFail($id);
        $matrix->delete();
        return back()->with('message', "Resource deleted successfully!");
    }
}
