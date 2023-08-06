<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class FooterController extends Controller
{
    public function terms(){
        return view('footer.terms');
    }
    public function privacy(){
        return view('footer.privacy');
    }
    public function disclaimer(){
        return view('footer.disclaimer');
    }
    
    public function sendEmailToAllUsers()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Loop through each user and send the email
        foreach ($users as $user) {
            // Send the email
            Mail::send('emails.to_users', ['user' => $user], function ($message) use ($user) {
                $message->from('no-reply@bojuboju.xyz', 'BojuBoju');
                $message->to($user->email)->subject('BojuBoju is back🥳');
            });
        }

        // Return a response or redirect as needed
        return 'Email sent to all users!';
    }
}
