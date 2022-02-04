<?php

namespace App\Http\Controllers;

use App\Models\MappedData;
use Illuminate\Http\Request;

class AllMapedDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MappedData::with('user','pillar')->get();
        return view("mapped.index",compact("data"));
    }


}
