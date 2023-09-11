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
            'content' => 'required|min:3|max:255|'
        ]);

        //comment this if want to stop generating new data to db
        $ideas = ideas::create(
            [
                'content' => request()->get('content', ''),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Idea created successfully !');
    }


    public function destroy(ideas $ideas){ //the '$ideas' name should be the saame as in the route web.php
        $ideas->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully !');
    }

    public function edit (ideas $ideas){

        $editing = true;

        return view('ideas.show',['idea' => $ideas], compact('editing'));

    }

    public function update (ideas $ideas){

        request() -> validate([
            'content' => 'required|min:3|max:255|'
        ]);

        $ideas->content = request()->get('content', '');
        $ideas->save();

        return redirect()->route('ideas.show', $ideas->id)->with('success', "Idea updated successfully !");

    }
}
