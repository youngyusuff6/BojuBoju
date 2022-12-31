<?php

namespace App\Http\Controllers;

use ResizeImage;
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
public function store(Request $request){
    // Validate the request
    $this->validate($request, [
        'message' => 'required|min:4|max:300',
        'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
    ]);

    // Get the user's ID
    $username = $request->input('username');
    $user_id = User::where('users.username','=', $username)->value('users.id');

    // Create a new message and decoy record
    $message = new Message();
    $decoy_table = new Message_decoy();

    // If the request has an image, save it to the file system
    if ($request->hasFile('image')) {
        // Get the file extension
        $extension = $request->file('image')->getClientOriginalExtension();

        // Construct a unique name for the image file
        $fileNameToStore = 'messageImage_'.$user_id.'_'.time().'.'.$extension;

        // Construct the destination folder directory string
        $FILE_UPLOADS_ROOT_DIRECTORY = './UPLOADS/'."MESSAGE_IMAGE/".date('m-d').'/'.$user_id;

        // Create the directory if it doesn't exist
        File::makeDirectory($FILE_UPLOADS_ROOT_DIRECTORY, 0777, true, true);

        // Save the uploaded image to the directory
        $request->image->move($FILE_UPLOADS_ROOT_DIRECTORY, $fileNameToStore);

        // Resize the image using the image resize library
        $image = new ResizeImage($FILE_UPLOADS_ROOT_DIRECTORY.'/'.$fileNameToStore);
        $image->resizeTo(300, 300, 'maxWidth');
        $image->saveImage($FILE_UPLOADS_ROOT_DIRECTORY.'/'.$fileNameToStore);

        // Set the image path in the message record
        $path = './UPLOADS/'."MESSAGE_IMAGE/".date('m-d').'/'.$user_id."/".$fileNameToStore;
    } else {
        // Set the image path to null if no image was provided
        $path = NULL;
    }


            // FUNCTION TO HELP US FETCH THE IP ADDRESS OF THE WEBSITE VISITORS
        function getUserIpAddr(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

        $message->ip_address = getUserIpAddr();
        $message->image = $path;
        $message->message = $request->input('message');
        $message->username = $request->input('username');
        $message->user_id = $user_id;
        $message->save();

        $decoy_table->ip_address = getUserIpAddr();
        $decoy_table->image = $path;
        $decoy_table->message = $request->input('message');
        $decoy_table->username = $request->input('username');
        $decoy_table->user_id = $user_id;
        $decoy_table->save();

        Toastr::success('Message Sent Successfully. Now it`s your turn to write!','Message Sent!');      
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

        return redirect()->route('home')->with('message', 'deleted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function react(Request $request, $id){
        $id = DETOKENIZE($id);
        return $id;
     }


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
