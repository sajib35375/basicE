<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::all();
        return view('admin.service.index',compact('service'));
    }
    public function create(){
        return view('admin.service.create');
    }
    public function store(Request $request){
        Service::create([
            'title' => $request->title,
            'description' => $request->discription,
            'font' => $request->font,
        ]);
        return redirect()->back()->with('success','service inserted successfully');
    }
}
