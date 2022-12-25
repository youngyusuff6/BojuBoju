<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

      // Here we creat the fillable property, to use it to declare the colums in our database table that can be mass assigned. 
      protected $fillable = [
        'user_id',
        'username',
        'message',
        'image',
        'ip_address',
    ];
      // just set this property to false if you dont want to use timestamp
      public $timestamps = true;
  

    public function messages(){
        return $this->belongsTo(User::class, 'username');
    }
}
