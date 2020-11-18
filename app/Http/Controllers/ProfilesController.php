<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        dd($user->profile); //todo:solve te problem of user doesnt have profile or posts!!
        
        return view('profiles.index',compact('user'));
            
        
    }

    public function edit(User $user){
     $this->authorize('update',auth()->user()->profile);

        return view ('profiles.edit');

    }
    public function update(User $user){

        $this->authorize('update',auth()->user()->profile);

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>['url','nullable'],
            'image'=>''
        ]);
        auth()->user()->profile->update($data);
        
        return redirect("/profile/{$user->id}");
    }
}
