<?php

namespace App\Livewire;

use App\Models\Listing;
use Livewire\Component;

class Search extends Component
{
    public $search = "";
    public $results = [];

    public function render()
    {
        if (strlen($this->search) >= 1) {
            $this->results = Listing::where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('position', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })->get();
        } else {
            $this->results = [];
        }

        return view('livewire.search');
    }
}
