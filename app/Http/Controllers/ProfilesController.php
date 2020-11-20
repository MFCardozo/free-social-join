<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows=(auth()->user())? auth()->user()->following->contains($user->id):false;

        $postCount=Cache::remember('counts.posts.' . $user->id,
        now()->addSeconds(30),
        function()use ($user){
            return $user->posts->count();
        });
        $followersCount=Cache::remember('counts.followers.' . $user->id,
        now()->addSeconds(30),
        function()use ($user){
            return $user->profile->followers->count();
        });
        $followingCount=Cache::remember('counts.following.' . $user->id,
        now()->addSeconds(30),
        function()use ($user){
            return $user->following->count();
        });
        
        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount'));
            
        
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

                $imagePath="profile/" . request('image')->hashName();

                $image=Image::make(request('image'))->fit(1000,1000)->encode('jpg');

                 Storage::disk('s3')->put($imagePath,(string)$image);
                
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
