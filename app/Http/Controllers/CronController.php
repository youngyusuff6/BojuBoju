<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function deleteOldMessages()
    {
        // Get all messages that were created 15 or more days ago
        $messages = Message::where('created_at', '<=', Carbon::now()->subDays(15))->get();
    
        // Loop through each message
        foreach ($messages as $message) {
            // Check if the message has an image
            if ($message->image) {
                // Construct the path to the image
                $FILE_UPLOADS_ROOT_DIRECTORY = './UPLOADS/MESSAGE_IMAGE/';
                $image_path = $FILE_UPLOADS_ROOT_DIRECTORY . $message->image;
    
                // Check if the file exists and delete it
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
    
            // Delete the message from the database
            $message->delete();
        }
    }
    
    
}
