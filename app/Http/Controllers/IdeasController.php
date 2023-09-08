<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ideas;

class IdeasController extends Controller
{
    public function show (ideas $ideas){

        return view('ideas.show', [
            'idea' => $ideas

            //'idea' instead 'ideas' becaus in the views there's no foreach $ideas = $idea
            // only $idea. Hence we need to declare 'idea' here
        ]);

    }

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


    public function destroy(ideas $ideas){ //the '$ideas' name should be the saame as in the route web.php
        $ideas->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully !');
    }
}
