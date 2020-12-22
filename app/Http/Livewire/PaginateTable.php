<?php

namespace App\Http\Livewire;


use App\Models\ScotList;
use Livewire\Component;
use Livewire\WithPagination;

class PaginateTable extends Component



{

use WithPagination;

        public $active = false;
        public $search;
        public $sortField;
        public $sortAsc = true;
        protected $queryString = ['search', 'active', 'sortAsc', 'sortField'];

// Reseting page for Links
    public function updatingSearch(){

        $this->resetPage();

    }

// sorting by Ascending and Descending
    public function sortBy($field){

        if ($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }

        $this->sortField = $field;

    }

    public function render()
    {
        // $scotlist = scotlist::paginate(10);
        return view('livewire.paginate-table', [
        'scotlists' => ScotList::where(function($query){
            $query->where('FIRSTNAME', 'like', '%' . $this->search . '%' )
                 ->orWhere('LASTNAME', 'like', '%' . $this->search . '%' );
        })->where('active', $this->active)
          ->when($this->sortField, function ($query){
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })
          ->paginate(10),
        ]);


    }
}
