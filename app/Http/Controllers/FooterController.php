<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Null_;

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
    public function postReaction(Request $request){
        dd($request);
    }
    public function admin(){
        // $get_message = Message::where('updated_at','<>', Carbon::now())->get();
        $get_message = Message::where('username','<>', Null)->get();
//         $queryBuilder = DB::table('files')->whereRaw('created_at >= now() - interval 168 hour');
// foreach($queryBuilder->get() as $file){
//     File::delete(public_path().$file->path);
// }    
       
    }
}
