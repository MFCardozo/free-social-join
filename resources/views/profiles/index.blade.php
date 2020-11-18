@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-3 p-5">
            <img src="http://placekitten.com/200/200" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>

                    
                </div>

                
                    <a href="/p/create">Add New Post</a>
               

            </div>

            @can('update',$user->profile)

                    <a href="/profile/{{Auth::user()->id }}/edit">Edit Profile</a>

                
            @endcan
            

            <div class="d-flex">
                <div class="pr-5"><strong>{{Auth::user()->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>324234</strong> followers</div>
                <div class="pr-5"><strong>4324</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{Auth::user()->profile->title}}</div>
            <div>{{Auth::user()->profile->description}}</div>
            <div><a href="#">{{Auth::user()->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach(Auth::user()->posts as $post)
            <div class="col-4 pb-4">
                <a href="../p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                </a>
            </div>
            @endforeach
        
    </div>
</div>
@endsection
