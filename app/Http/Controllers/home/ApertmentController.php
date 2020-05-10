<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApertmentController extends Controller
{
    //
    public function apertmentView(){
        return view('home.apertments');
    }
}
