<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    public function HomeSlider(){
        return view('admin.slider');
    }
    public function SliderStore(Request $request){
        $slider_img = $request->file('image');
        $unique_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
        Image::make($slider_img)->resize(1920,1088)->save('Image/slider/'.$unique_name);
        $last_image = 'Image/slider/'.$unique_name;
        Slider::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $last_image,
        ]);
        return redirect()->back()->with('success','slider inserted successfully');
    }
    public function SliderShow(){
        $sliders = Slider::latest()->get();
        return view('admin.home.slider_show',compact('sliders'));
    }

    public function SliderDelete($id){
        $delete = Slider::find($id);
        $del_img = $delete->image;
        unlink($del_img);
        $delete->delete();
        return redirect()->back()->with('success','slider deleted successfully');
    }



}
