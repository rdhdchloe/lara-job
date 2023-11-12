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
    
    #[Url()]
    public $popular = false;

    public function sortListing($sort){
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function togglePopular()
    {
        $this->popular = !$this->popular;
    }

    #[Computed()]
    public function listings()
    {
        $query = Listing::orderBy('created_at', $this->sort)->with(['user', 'tags'])
            ->filter(request()->only('search'));
    
        if ($this->popular) {
            $query->withCount('views as views_count')
                  ->orderBy("views_count", 'desc');
        }
    
        return $query->paginate(10);
    }

    public function render()
    {
        return view('livewire.listing-list');
    }
}
