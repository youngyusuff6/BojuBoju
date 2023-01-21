<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contact(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:60',
            'email' => 'required|email',
            'sub' => 'required|min:4|max:50',
            'message' => 'required|min:4|max:300',
            'phone' => 'nullable'
        ]);
    
        ContactUs::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('sub'),
            'message' => $request->input('message'),
            'phone' => $request->input('phone')
        ]);
    
        // send the email
        Mail::send('emails.thankyou', ['name' => $request->input('name')], function($message) use ($request) {
            $message->to($request->input('email'))->subject('Thank you for contacting BojuBoju');
        });
    
        Toastr::success('Thank you for contacting us. We will get back to you soon!');    
        return redirect()->back();
    }
    
}
