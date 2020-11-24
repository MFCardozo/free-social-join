<?php

namespace App\Http\Livewire;
use App\Models\{User,Profile};
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';
    public function render()
    {
        $searchResults=[];

        if(strlen($this->search)>2){

            $searchResults=User::select('username','profiles.image')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('username','LIKE','%'.$this->search.'%')
       ->orWhere('name','LIKE','%'.$this->search.'%')
       ->get()->toArray();
        }

        dump($searchResults);
        return view('livewire.search-dropdown',[
            'searchResults'=>$searchResults,
            ]);
    }
}
