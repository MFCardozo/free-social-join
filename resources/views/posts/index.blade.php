@extends('layouts.app')



@section('content')
<div class="container">

    @foreach($posts as $post)

    <div class="row">
        <div class="col-sm-9 col-md-6  offset-md-3 pb-4">
            <img src="/storage/{{ $post->image }}" class="w-100" alt={{$post->caption}}>

             
                
                 <div class="d-flex align-items-baseline py-2">
                     <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <span>
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark font-weight-bold">{{ $post->user->username }}</span>
                        </a>
                        {{ $post->caption }}
                    </span>
                     
                </div>

            
        </div>
        
    @endforeach

    <div class="row">
        <div class="col-12 d-flex">
            {{$posts->links()}}
        </div>
    </div>

    </div>
@endsection

