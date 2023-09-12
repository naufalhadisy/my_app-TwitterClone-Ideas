<?php

namespace App\Http\Controllers;

use App\Models\ideas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $ideas = ideas::orderBy('created_at', 'DESC');

        //check if there is a search
        //if there is, check the value based on database
        if (request()->has('search')){

            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            // 'ideas' => ideas::all()
            'ideas' =>$ideas->paginate(5)
        ]);
    }
}
