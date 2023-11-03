<div>
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex justify-end space-x-8">
          <button class="{{ $sort === 'desc' ? 'sort-current' : 'sort-default'}} sort-nav"
          wire:click="sortListing('desc')">新しい順</button>
          <button class="{{ $sort === 'asc' ? 'sort-current' : 'sort-default'}} sort-nav"
          wire:click="sortListing('asc')">古い順</button>
          <button class="{{ $popular ? 'sort-current' : 'sort-default'}} sort-nav"
          wire:click="togglePopular">人気順</button>
        </nav>
    </div>
    <div class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-2 my-10">
        @if(count($this->listings) > 0)
            @foreach ($this->listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>求人が見つかりませんでした。</p>
        @endif
    </div>
    {{ $this->listings->links() }}
</div>
