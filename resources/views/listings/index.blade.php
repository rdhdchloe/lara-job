<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listings') }}
        </h2>
        <a href="{{ route('listings.create') }}" class="text-white-500">新規作成</a>
    </x-slot>
    @unless(count($listings) == 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-12">
                    <div class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                        @foreach ($listings as $listing)
                        <x-listing-card :listing="$listing" />
                        @endforeach
    @else
                        <p>No listings found.</p>
                    </div>
                </div>
            </div>
        </div>
    @endunless
</x-app-layout>
