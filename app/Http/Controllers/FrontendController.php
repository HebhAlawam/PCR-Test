<?php

namespace App\Http\Controllers;
use App\Models\Center;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $centers = Center::latest()->paginate(10);
        return view('frontend.index',compact('centers'));
    }

    
}
