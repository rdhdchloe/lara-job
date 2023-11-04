@props(['listing'])

<div class="rounded-md shadow ring-1 ring-gray-500/5 h-full">
    <dl class="break-all pt-3">
        <div class="pl-3 flex-center flex-wrap">
            <x-listing-tags :tags="$listing->tags"/>
            <time class="list pr-3" datetime="{{ $listing->created_at->toDateString() }}">{{ $listing->created_at->format('Y-m-d') }}</time>
        </div>
        <div class="flex-auto px-3">
            <h2 class="mt-1 text-base font-semibold leading-6 text-gray-900">
                {{ $listing->title }}
            </h2>
        </div>
        <div class="mt-3 border-t border-gray-900/5 px-3 pt-6">
            <dd class="list text-gray-900">{{ Str::limit($listing->description, 50) }}</dd>
        </div>
        <div class="list-wrapper">
            <dt class="flex-none">
                <x-heroicon-o-briefcase/>
            </dt>
            <dd class="list font-medium">{{ $listing->company }}</dd>
        </div>
        <div class="list-wrapper">
            <dt class="flex-none">
                <x-heroicon-o-link/>
            </dt>
            <a href="{{$listing->url}}" target="_blank" class="list hover:underline">{{$listing->url}}</a>
        </div>
        <div class="mt-4 list-wrapper justify-end">
            <dt class="flex-none">
                <x-heroicon-o-map-pin/>
            </dt>
            <dd class="list">
                {{ __($listing->location) }}
            </dd>
        </div>
    </dl>
    <div class="mt-3 border-t border-gray-900/5 p-3 flex-center">
        <a href="/listings/{{ $listing->id }}" class="text-sm font-semibold leading-6 text-gray-900">求人を見る <span aria-hidden="true">&rarr;</span></a>
        <x-listing-view :listing="$listing" />
    </div>
</div>