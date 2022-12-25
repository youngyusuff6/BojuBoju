<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Message_decoy;
use Illuminate\Http\Request;
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
            $timeOfTheDay = 'Morning';
        }elseif($hour >= 12 && $hour <=17){
            $timeOfTheDay = 'Afternoon';
        }elseif($hour >= 18 && $hour <=23){
            $timeOfTheDay = 'Evening';
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
        $username = $request->input('username');
        $user_id = User::where('users.username','=', $username)->value('users.id');
        $message = new Message();
        $decoy_table = new Message_decoy();

        $this->validate($request,[
            'message' => 'required|min:4|max:300',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);
        // 
        if($request->hasFile('image')){
             // Get just Extension
             $extension = $request->file('image')->getClientOriginalExtension();
             // construct a unique name for our new image file
             $fileNameToStore = 'messageImage_'.$user_id.'_'.time().'.'.$extension;
             $TEMP_IMAGE_NAME = "TEMP_".$user_id.'_messageImage_'.time().'.'.$extension;
             // construct destination folder directory string.
             $FILE_UPLOADS_ROOT_DIRECTORY = './UPLOADS/'."MESSAGE_IMAGE/".'/'.date('m-d').'/'.$user_id;
            
        
             // save image file to disk (Upload Image)
             $request->image->move(public_path($FILE_UPLOADS_ROOT_DIRECTORY), $TEMP_IMAGE_NAME);
          

            /* we create a full path to the location of the image we want to save to file. This part will link with the temporary image. */
            $TEMP_FULL_PATH_TO_IMAGE = $FILE_UPLOADS_ROOT_DIRECTORY.'/'.$TEMP_IMAGE_NAME;

            // HERE WE CREATE TWO INSTANCES OF THE "ResizeImage" CLASS BELOW, SO WE CAN USE ITS OBJECT TO RESIZE THE IMAGE WE JUST STORED IN A TEMPORARY 
            // LOCATION ON THE SERVER, REASON WE HAVE THAT TEMPORARY STORED IMAGE IS SO THAT WE CAN EDIT IT TO GET ALL OTHER SIZES OF IMAGES WE WANT BEFORE
            // WE DELETE THE TEMPORARY IMAGE.
            $resize_Object = new \ResizeImage($TEMP_FULL_PATH_TO_IMAGE);
            // HERE WE USE THE FIRST OBJECT OF OUR "ResizeImage" CLASS TO RECREATE THE TEMPORARY IMAGE AND RESIZE THE SAMPLE OF THE RECREATED TREMPORARY
            // IMAGE TO THE STANDARD SIZE FOR DISPLAY PICTURES ON THIS PLATFORM. AT THE END OF THIS FIRST RESIZING WE SAVE THE NEWLY RESIZED IMAGE DATA TO
            // FILE WITH A NEW UNIQUE NAME AND WE PURGE THE FIRST OBJECT OF OUR "ResizeImage" CLASS, TO RELEASE MEMORY.
            $resize_Object->resizeTo(500, 600, 'exact');
            $resize_Object->saveImage($FILE_UPLOADS_ROOT_DIRECTORY.'/'.$fileNameToStore);
            $resize_Object = null;
            // NOW AT THIS JUNCTION WE ARE CERTAIN THAT WE ARE DONE USING THE TEMPORARY IMAGE WE SAVED EARLIER AND USED TO CREATE TWO DIFFERENT SIZES OF
            // IMAGES, NOW THE TEMPORARY IMAGE IS OF NO USE TO US ANYMORE, THEREFORE WE RUN THE FUNCTION BELOW TO DELETE IT FROM THE SERVER
            $this->FILE_DELETER($TEMP_FULL_PATH_TO_IMAGE);
            // Here is the exact path we need to save in the database, if we want this app to work on local and live servers respectively.
            $path = './UPLOADS/'."MESSAGE_IMAGE/".'/'.date('m-d').'/'.$user_id."/".$fileNameToStore;
        }else{
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
        $path = './UPLOADS/'."MESSAGE_IMAGE/".$user_id;
       
        if(File::exists($path)){
               File::deleteDirectory($path);
            }
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
