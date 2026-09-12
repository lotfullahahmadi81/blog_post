<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact.contact')
        ->with('setting',Setting::first());
    }
}
