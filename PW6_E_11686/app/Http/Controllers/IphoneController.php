<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iphone;

class IphoneController extends Controller
{
    public function index(){
        $seriess = Iphone::get();

        return view('iphone', compact('seriess'));
    }
}
