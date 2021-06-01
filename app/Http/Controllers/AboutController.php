<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout(){
        $data = AboutUs::latest()->get();
        return view('admin.HomeAbout.index',compact('data'));
    }
    public function homeCreate(){
        return view('admin.HomeAbout.create');
    }
    public function homeStore(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short_dis' => 'required',
            'long_dis' => 'required'
        ]);
        AboutUs::create([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);
        return redirect()->back()->with('success','Data inserted successfully');
    }
}
