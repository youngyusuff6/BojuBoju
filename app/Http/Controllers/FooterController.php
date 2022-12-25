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
}
