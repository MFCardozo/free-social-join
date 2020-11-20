@extends('layouts.app')



@section('content')
<div class="container">

    @foreach($posts as $post)

    <div class="row py-4 px-2">
        <div class="col-sm-12 col-md-6  offset-md-3  card">
            <a href="../p/{{$post->id}}">
            <img src="https://freesocialjoin.s3.us-east-2.amazonaws.com/{{ $post->image }}" class="mw-100 rounded pt-1" alt={{$post->caption}}>
                </a>
             
                
                 <div class="d-flex align-items-baseline py-2">
                     <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100 " style="max-width: 40px;">
                    </div>
                    <span>
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark font-weight-bold">{{ $post->user->username }}</span>
                        </a>
                        {{ $post->caption }}
                    </span>
                     
                </div>

            
        </div>
    </div>
        
    @endforeach

    <div class="row w-100">
        <div class="col-12 d-flex">
            {{$posts->links()}}
        </div>
    </div>

    </div>
@endsection

