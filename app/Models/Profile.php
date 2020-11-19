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

      $imagePath=$this->image? $this->image : 'profile/rv2Fag9yuL6Kz5bHYWYgI1yZw7ZtlmoFn8DrOQFt.jpeg';
      return '/storage/' . $imagePath;
    }
    public function user(){

      return  $this->belongsTo(User::class);
    }
}
