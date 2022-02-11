<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matrix;
use App\Models\Pillar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $pillarsCount = Pillar::count();
        $matrixCount = Matrix::count();

        $matrix  = Matrix::latest()->orderBy('created_at')->get();
        $pillars = Pillar::all();

       return view('dashboard', compact('users','pillars','matrix'));
    }

}
