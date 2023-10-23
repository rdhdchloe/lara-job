<?php

namespace App\Livewire;

use App\Models\Listing;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ListingList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    public function sortListing($sort){
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }


    #[Computed()]
    public function listings()
    {
        return Listing::orderBy('created_at', $this->sort)->with(['user', 'tags'])->filter(request()->only('search'))->paginate(10);
    }

    public function render()
    {
        return view('livewire.listing-list');
    }
}
