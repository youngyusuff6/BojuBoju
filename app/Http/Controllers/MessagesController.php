<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $username = auth()->user()->username;
        return view('messages.dashboard')->with('username', $username);
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
            'message' => 'required|min:5'
        ]);
        $message->message = $request->input('message');
        $message->user_id = $request->input('username');
        $message->save();

        return redirect('/messages')->with('message', 'Now it`s your turn to write');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Message::latest()->paginate(5);
        return view('messages.MyMessages')->with('messages', $messages);
    }
    
    public function display($username){
                $username = User::whereUsername($username)->firstOrFail();
                return view('messages.create')->with('username', $username);        
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
