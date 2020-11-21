@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-sm-12 col-md-8 pb-1">
            <img src="https://freesocialjoin.s3.us-east-2.amazonaws.com/{{$post->image}}" class="w-100 rounded" alt="{{$post->caption}}">
        </div>
        <div class="col-md-4 col-sm-12">
             <div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-baseline">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    
                        <div class="font-weight-bold d-flex justify-content-between">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                             {{-- cannot follow myself!! --}}
                         </div>
                     
                    </div>
                    
                      @if(Auth::user()->id!=$post->user->id)
                        <follow-button  user-id="{{$post->user->id}}" follows="{{$follows}}"></follow-button>

                    @endif
                </div>

                <hr>
                 <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}
                </p>

        </div>
@endsection