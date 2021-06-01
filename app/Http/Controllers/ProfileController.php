<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $profile = User::find(Auth::user()->id);
        return view('admin.profile',compact('profile'));
    }
    public function profileUpdate(Request $request){
        $id = Auth::user()->id;
        $update_profile = User::find($id);
        $update_profile->name = $request->name;
        $update_profile->email = $request->email;
        $update_profile->update();
        return redirect()->back()->with('success','profile update successfully');
    }
}
