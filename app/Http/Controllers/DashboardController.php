<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Jobcard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            "name" => "Gad Omuse",
            'frameworks' => ['vue','innertia','laravel']
        ]);
    }

}
