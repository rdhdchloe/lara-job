{{-- @include('listings.index') --}}
<x-app-layout :title="$tag->name">
    <x-slot name="header">
        <div class="flex-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $tag->name }}
            </h2>
            <a href="{{ route('listings.create') }}" type="button" class="action-btn">求人を作成する</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="block">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6 md:p-12">
                    <div class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-2 my-10">
                        @if(count($listings) > 0)
                            @foreach ($listings as $listing)
                                <x-listing-card :listing="$listing" />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>