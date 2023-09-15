<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ideas;

class IdeasController extends Controller
{
    public function show (ideas $ideas){

        // dd($ideas->comments);

        return view('ideas.show', ['idea' => $ideas]);

    }

    public function store(){

        $validated = request() -> validate([
            'content' => 'required|min:3|max:255|'
        ]);

        //comment this if want to stop generating new data to db
        $ideas = ideas::create(
            [
                'content' => request()->get('content', ''),
            ]
        );

        $ideas = ideas::create($validated);

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

        $validated = request() -> validate([
            'content' => 'required|min:3|max:255|'
        ]);

        $ideas->update($validated);

        return redirect()->route('ideas.show', $ideas->id)->with('success', "Idea updated successfully !");

    }
}
