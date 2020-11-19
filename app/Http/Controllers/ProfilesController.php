<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // dd($user->profile); //todo:solve te problem of user doesnt have profile or posts!!
        
        return view('profiles.index',compact('user'));
            
        
    }

    public function edit(User $user){
     $this->authorize('update',$user->profile);

        return view ('profiles.edit',compact('user'));

    }
    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data=request()->validate([
            'title'=>'required',
            'description'=>'',
            'url'=>['url','nullable'],
            'image'=>''
        ]);
        
            if(request('image')){

                $imagePath=request('image')->store('profile','public');

                $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
                $image->save();
                
                $imageArray=['image'=>$imagePath];

            }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
            
        ));
        
        return redirect("/profile/{$user->id}");
    }

    public function followers(){

        return $this->belongsToMany(User::class);
    }
}
