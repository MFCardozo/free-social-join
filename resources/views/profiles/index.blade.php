@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row flex-nowrap">
        <div class="col-md-3 col-sm-1" style="max-width: 25vw;">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-md-9 col-sm-12 pt-2">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>

                    {{-- cannot follow myself!! --}}

                    @if(Auth::user()->id!=$user->id)
                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>

                    @endif

                    
                </div>
                <div class="d-flex align-items-center pb-3">

                @can('update',$user->profile)
                    <a class="btn  btn-secondary"  href="/p/create">Add New Post</a>
                    @endcan

                </div>
               

            </div>

            
            @can('update',$user->profile)

                    <a href="/profile/{{$user->id }}/edit">Edit Profile</a>

                
            @endcan
            

            <div class="d-flex">
                <div class="pr-5"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> followers</div>
                <div><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 py-2 card">
                <a href="../p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100 rounded">
                </a>
            </div>
            @endforeach
        
    </div>
</div>
@endsection
