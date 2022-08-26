<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
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
        $message = new Message();

        $this->validate($request,[
            'message' => 'required|min:5|max:270',
            'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('images','public');
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
        $message->user_id = $request->input('username');
        $message->save();

        return back()->with('message', 'Message Sent Successfully. Now it`s your turn to write');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $username = auth()->user()->user_id;
        // $user = User::find($username);
        $messages = Message::where('user_id', Auth::user()->username)->latest()->paginate(5);
        return view('messages.MyMessages')->with('messages', $messages);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
