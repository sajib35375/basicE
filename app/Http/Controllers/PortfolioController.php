<?php

namespace App\Http\Controllers;

use App\Models\Multi;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function Portfolio(){
        $multi_pic = Multi::all();
        return view('portfolio.portfolio',compact('multi_pic'));
    }
}
