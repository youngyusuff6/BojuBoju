<?php

namespace App\Http\Controllers;

use ResizeImage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Message_decoy;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'display']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //Time of the day logic
        $timeOfTheDay = '';
        $hour = date('H');
        if($hour >= 00 && $hour <=11){
            $timeOfTheDay = 'morning';
        }elseif($hour >= 12 && $hour <=17){
            $timeOfTheDay = 'afternoon';
        }elseif($hour >= 18 && $hour <=23){
            $timeOfTheDay = 'evening';
        }
        //Fetch name
        $name = auth()->user()->name;
        //Fetch username
        $username = auth()->user()->username;
        return view('messages.dashboard')->with([
            'username'=> $username,
            'timeOfTheDay' => $timeOfTheDay,
            'name' => $name
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'message' => 'required|min:4|max:300',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);
    
        // Get the user's ID
        $username = $request->input('username');
        $user_id = User::where('username', $username)->value('id');
    
        // Create a new message and decoy record
        $message = new Message();
        $decoy_table = new Message_decoy();
    
        // Check if the request has an image
        if ($request->hasFile('image')) {
            // Get the image's extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Add a random text

            // Construct a unique name for the image file
            $fileNameToStore = 'BojuBoju_' . $user_id . uniqid() .'_' .date('m-d'). '_' . time() . '.' . $extension;
    
            // Construct the destination folder directory string
            $FILE_UPLOADS_ROOT_DIRECTORY = './UPLOADS/MESSAGE_IMAGE/';
    
            // Create the directory if it doesn't exist
            File::makeDirectory($FILE_UPLOADS_ROOT_DIRECTORY, 0777, true, true);
    
            // Save the uploaded image to the directory
            $request->image->move($FILE_UPLOADS_ROOT_DIRECTORY, $fileNameToStore);
    
            // Resize the image using the image resize library
            $image = new ResizeImage($FILE_UPLOADS_ROOT_DIRECTORY . '/' . $fileNameToStore);
            $image->resizeTo(300, 300, 'maxWidth');
            $image->saveImage($FILE_UPLOADS_ROOT_DIRECTORY . '/' . $fileNameToStore);
    
            // Set the image name in the message record
            $image_name = $fileNameToStore;
        } else {
            // Set the image name to null if no image was provided
            $image_name = NULL;
        }
    
        // Get the user's IP address
        function getUserIpAddr()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                // IP address from shared internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                // IP address passed through proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
    
        // Set the message record's data
        $message->ip_address = getUserIpAddr();
        $message->image = $image_name;
        $message->message = $request->input('message');
        $message->username = $request->input('username');
        $message->user_id = $user_id;
        $message->save();

        $decoy_table->ip_address = getUserIpAddr();
        $decoy_table->image = $image_name;
        $decoy_table->message = $request->input('message');
        $decoy_table->username = $request->input('username');
        $decoy_table->user_id = $user_id;
        $decoy_table->save();

        Toastr::success('💬 Your anonymous message has been sent, keep it coming!!','Message Sent!');      
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
        $messages = Message::where('username', Auth::user()->username)->latest()->paginate(5);
        return view('messages.MyMessages',[
            'messages' => $messages
        ]);
    }
    
    public function display($username){
                $username = User::whereUsername($username)->firstOrFail();
                return view('messages.create')->with('username', $username);    
            
    }

    public function getSettings(){
        return view('settings.settings');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $user_id =  Auth::id();
        $path = './UPLOADS/MESSAGE_IMAGE';

        // Get all of the directories that contain images for this user
        $image_directories = File::directories($path, $user_id);

        // Loop through each directory and delete it
        foreach ($image_directories as $directory) {
            File::deleteDirectory($directory);
        }

        // Delete the user record
        $user = User::where('id','=', $user_id)->delete();
         Toastr::success('Account Deleted.','Done!');   
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /* FUNCTION TO DELETE A FILE FROM A GIVEN REAL PATH TO THE FILE TO BE DELETED. E.G C://HOLE/BOOKS/DASH.JPG   */
    private function FILE_DELETER($filename){
        /* check if the file real path is writable and if its exist and actually points to a file. */
        IF( (is_writable ($filename)) && (file_exists($filename)) ){
            /* control in here signifies that the file real path is writable and points to a file, therefore we delete the file the path is pointing to.  */
            @unlink ($filename);
            /* we return true indicating to subsequent functions that delete operations was a success. */
            return TRUE;
        }ELSE{
            /* control in here signifies that the file real path is not writable and does not point to a file, therefore we return true indicating to subsequent functions 
            * that delete operations failed. */
            return TRUE;
        }
    }


}
