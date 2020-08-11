<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\User;

class ContactController extends Controller
{
    public function create(){
        return view('components.contact');
    }

    public function store(Request $request){
        
        // return new TestMail($request);
        Mail::to('jesus@hotmail.com')->send(new TestMail($request));
        return back();
    }
}
