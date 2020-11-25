<div class="position-relative  mt-3  mt-md-0">

    <input wire:model.debounce.500ms="search" type="text" class="ml-4 w-75 border-top-0 border-left-0 border-right-0 "
        placeholder="Search">


    <div wire:loading class="spinner-border spinner-border-sm position-absolute" style="right:18px;top:5px"
        role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="position-absolute" style="top:0;width:20px;">

        <svg viewBox="0 0 18 18">
            <path
                d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z">
            </path>
        </svg>
    </div>

    <div class="position-absolute text-sm mt-4 w-100 ">

        @if (count($searchResultsUser)>0)

        <ul class="navbar-nav ml-4">
            @foreach ($searchResultsUser as $user)


            <li class="border-bottom w-100 bg-light d-flex align-items-center" style="z-index:1000;">
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100 mr-1"
                    style="max-width: 30px;">
                <a href="/profile/{{ $user->id }}" class="text-dark  d-block">{{$user->username}}</a>
            </li>
            @endforeach

        </ul>



        @elseif(count($searchResultsUser)==0 && !empty($search))


        <div class="px-3 py-3 bg-light">No results for "{{$search}}"</div>


        @endif
    </div>
</div>