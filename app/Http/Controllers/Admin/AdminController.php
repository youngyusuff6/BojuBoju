<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Message;
use App\Models\Message_decoy;

class AdminController extends Controller
{
    public function index(){
        $user_count = User::all()->count();
        $message_count = Message::all()->count();
        $total_message_count = Message_decoy::all()->count();
        $images_count = Message::where('image','<>',NULL)->count();
        $total_images_count = Message_decoy::where('image','<>',NULL)->count();

        $contact_us = ContactUs::where('message','<>', NULL)->latest()->paginate(50);

        return view('admin.index',[
            'user_count' => $user_count,
            'message_count' => $message_count,
            'total_message_count' => $total_message_count,
            'images_count' => $images_count,
            'total_images_count' => $total_images_count,
            'contact_us' => $contact_us
        ]);
    }
}
