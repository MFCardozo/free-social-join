<?php

namespace App\Http\Livewire;
use App\Models\{User,Profile};
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';
    public function render()
    {
        $searchResultsUser=[];

        if(strlen($this->search)>2){
//             select('id','username','profiles.image')
//             ->join('profiles', 'users.id', '=', 'profiles.user_id')
// ->toArray();
            $searchResultsUser=User::
            where('username','LIKE','%'.$this->search.'%')
       ->orWhere('name','LIKE','%'.$this->search.'%')
       ->take(7)
       ->get();
        }

       
        return view('livewire.search-dropdown',[
            'searchResultsUser'=>$searchResultsUser,
            ]);
    }
}
