<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search;
    public $searchResults = [];

     public $money;

     public function updatedSearch ($newValue){
       if (strlen($this->search) < 3){
           $this->searchResults = [];
           return;

       }

      $response = Http::get('https://itunes.apple.com/search/?term='. $this->search . '&Limit=10');
      $this->searchResults = $response->json()['results'];

     }

    public function render()
    {
        //  $this->updatedSearch($newValue);
        return view('livewire.search-dropdown');
    }
}
