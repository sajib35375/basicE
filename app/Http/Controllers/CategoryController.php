<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $cat = Category::latest()->paginate(2);
        $trash = Category::onlyTrashed()->paginate(2);
        return view('category.index',compact('cat','trash'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required | unique:categories',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => str::slug($request->name),
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success','Category added successfully');

    }
    public function softdelete($id){
        $trashData = Category::find($id)->delete();
        return Redirect()->back()->with('success','trash updated successfully');
    }
    public function restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','trash updated successfully');
    }
    public function delete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','trash deleted successfully');
    }


}
