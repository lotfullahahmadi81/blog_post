<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function index(){
        return view('backend.about.index')->with('about',About::all()->first());
    }

    public function store(Request $request){
        $about = About::all()->first();

        $about->title = $request->title;
        $about->sub_title= $request->title;
        $about->description = $request->description;

        Session()->flash('success','about updated succesfully');

        $about->save();

        return redirect()->route('about.index');
    }
}
