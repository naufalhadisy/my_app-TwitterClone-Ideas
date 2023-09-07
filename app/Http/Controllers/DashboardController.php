<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        //comment this if want to stop generating new data to db
        $ideas = new ideas([
            'content' => 'Hello My App',
        ]);
        $ideas->save();
        
        return view('dashboard', [
            // 'ideas' => ideas::all()
            'ideas' => ideas::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
