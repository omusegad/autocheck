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
        $pillars = Pillar::count();
        $matrix = Matrix::count();

       return view('dashboard', compact('users','pillars','matrix'));
    }

}
