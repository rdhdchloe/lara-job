<x-app-layout title="求人一覧">
    <x-slot name="header">
        <div class="flex-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listings') }}
            </h2>
            <a href="{{ route('listings.create') }}" type="button" class="action-btn">求人を作成する</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="block">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6 md:p-12">
                    @if($search)
                        <p class="font-semibold">「{{ $search }}」の検索結果</p>
                    @endif
                    <livewire:listing-list />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
