<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ideas;

class IdeasController extends Controller
{
    public function store(){

        request() -> validate([
            'ideas' => 'required|min:3|max:255|'
        ]);

        //comment this if want to stop generating new data to db
        $ideas = ideas::create(
            [
                'content' => request()->get('ideas', ''),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Idea created successfully !');
    }
}
