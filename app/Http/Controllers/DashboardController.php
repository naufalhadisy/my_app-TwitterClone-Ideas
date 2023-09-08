<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        return view('dashboard', [
            // 'ideas' => ideas::all()
            'ideas' => ideas::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
