<?php

namespace App\Http\Controllers;

use App\Models\ChangePass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePassController extends Controller
{
    public function ChangePass(){
        return view('admin.change_password');
    }
    public function PasswordUpdate(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);


        $id = Auth::user()->id;
        $passData = User::find($id);
        $pass= Auth::user()->password;

       if ( password_verify($request->old_password,$pass)){
           $passData->password = password_hash($request->password,PASSWORD_DEFAULT);
           $passData->update();

          return redirect()->back()->with('success','password change successfully');
       }
    }
}
