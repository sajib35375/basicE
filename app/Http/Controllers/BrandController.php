<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multi;
use Image;
use Illuminate\Http\Request;



class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function AllBrand(){
        $data = Brand::latest()->paginate(10);
        return view('brand.index',compact('data'));
    }

    public function Store(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png'
        ]);
        $brand_image = $request->file('brand_image');
//        $unique_name = hexdec(uniqid());
//        $ex_name = strtolower($brand_image->getClientOriginalExtension());
//        $image_name = $unique_name.'.'.$ex_name;
//        $up_location = 'image/brand/';
//        $last_image = $up_location.$image_name;
//        $brand_image->move($up_location,$image_name);
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(400,300)->save('image/brand/'.$name_gen);
        $last_image = 'image/brand/'.$name_gen;

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
        ]);
        $notification = array(
            'message' => 'Brand Insert successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function Edit($id){
        $edit_data = Brand::find($id);
        return view('brand.edit',compact('edit_data'));
    }
    public function update(Request $request,$id){
        $update_data = Brand::find($id);
//        $this->validate($request,[
//            'brand_name' => 'required|unique:brands|min:4',
//            'brand_image' => 'required|mimes:jpg,jpeg,png'
//        ]);
        $old_image = $request->old_value;
        $update_image = $request->file('brand_image');
        if ($update_image){
            $unid = hexdec(uniqid());
            $ex_name = strtolower($update_image->getClientOriginalExtension());
            $image_name = $unid.'.'.$ex_name;
            $image_location = 'Image/brand/';
            $image = $image_location.$image_name;
            $update_image->move($image_location,$image_name);
            unlink($old_image);

            $update_data->brand_name = $request->brand_name;
            $update_data->brand_image = $image;
            $update_data->update();

            return redirect()->back()->with('success','Brand updated successfully');
        }else{
            $update_data->brand_name = $request->brand_name;
            $update_data->update();

            return redirect()->back()->with('success','Brand updated successfully');
        }



    }
    public function delete($id){
        $delete_data = Brand::find($id);
        $old_photo = $delete_data->brand_image;
        unlink($old_photo);
        $delete_data->delete();

        return redirect()->back()->with('success','Brand deleted successfully');

    }
    public function multiImage(){
        $all_pic = Multi::all();
        return view('brand.multi.index',compact('all_pic'));
    }
    public function multiStore(Request $request){
//        $this->validate($request,[
//            'multi_image' => 'required|mimes:png,jpg,jpeg'
//        ]);
        $multi_img = $request->file('multi_image');

        foreach($multi_img as $multi) {
            $image_name = hexdec(uniqid()) . '.' . $multi->getClientOriginalExtension();
            Image::make($multi)->resize(200, 400)->save('Image/brand/' . $image_name);
            $last_img = 'Image/brand/' . $image_name;
            Multi::create([
                'multi_image' => $last_img
            ]);
        }
        return redirect()->back()->with('success','Multi image upload successfully');
    }



}
