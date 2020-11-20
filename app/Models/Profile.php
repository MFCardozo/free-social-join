<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded=[];
    use HasFactory;

    public function profileImage(){

      //the path is a default image in my storage

      $imagePath=$this->image? 'https://freesocialjoin.s3.us-east-2.amazonaws.com/' . $this->image  : 'https://freesocialjoin.s3.us-east-2.amazonaws.com/profile/default.jpg';
      return  $imagePath;
    }
    public function user(){

      return  $this->belongsTo(User::class);
    }
    public function followers(){

      return $this->belongsToMany(User::class);
    }
}
