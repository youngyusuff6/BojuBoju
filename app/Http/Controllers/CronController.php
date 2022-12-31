<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function deleteOldMessages()
    {
        // Retrieve all messages that are older than 30 days
        $oldMessages = Message::where('created_at', '<', Carbon::now()->subDays(15))->get();
    
        // Loop through each message
        foreach ($oldMessages as $message) {
            // Delete the image file from the uploads folder if it exists
            if ($message->image != null) {
                unlink($message->image);
            }
    
            // Delete the message from the database
            $message->delete();
        }
    }
    
    
}
