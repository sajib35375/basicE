<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\UserContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function create(){
        return view('admin.contact.create');
    }
    public function store(Request $request){
        Contact::create([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->back()->with('success','contact inserted successfully');
    }
    public function ContactShow(){
        $contacts = Contact::first();
        return view('contact.index',compact('contacts'));
    }
    public function userContact(Request $request){
        UserContact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success','user contact information successfully inserted');
    }



}
