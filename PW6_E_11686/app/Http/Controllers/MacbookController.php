<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Macbook;

class MacbookController extends Controller
{
    public function index(){
        $seriess = Macbook::get();

        return view('macbook', compact('seriess'));
    }
}
