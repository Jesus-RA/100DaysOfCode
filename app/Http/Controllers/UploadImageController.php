<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index(){
        return view('upload-image');
    }

    public function store(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public');
            return redirect()->back()->withSuccess($image);
        }
        return redirect()->back();
    }
}
