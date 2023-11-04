<x-app-layout :title="$listing->title">
  <x-slot name="header">
    <x-listing-tags :tags="$listing->tags"/>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
      {{ $listing->title }}
    </h2>
    <div class="mt-2 flex flex-wrap">
      <div class="mr-5 flex items-center">
        <x-heroicon-o-briefcase />
        <span class="ml-1 max-w-2xl text-gray-500 text-sm">{{ $listing->company }}</span>
      </div>
      <div class="flex items-start mt-3 sm:mt-0">
        <x-heroicon-o-link />
        <a href="{{$listing->url}}" target="_blank" class="ml-1 list hover:underline break-all">{{$listing->url}}</a>
      </div>   
    </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-lg">
          <div class="border p-5 shadow rounded-md">
            <div class="px-4 sm:px-0 flex justify-end items-center text-sm leading-6 text-gray-500">
              <x-heroicon-o-user />
              <p class="max-w-2xl mr-2">{{ $listing->user->name }}</p>
              <x-heroicon-o-calendar-days/>
              <time class="mr-2" datetime="{{ $listing->created_at->toDateString() }}">{{ $listing->created_at->format('Y-m-d') }}</time>
              <x-listing-view :listing="$listing" />
            </div>
            <div class="mt-6 border-t border-gray-100">
              <dl class="divide-y divide-gray-100">
                <div class="item-wrapper">
                  <dt class="item-key">ポジション</dt>
                  <dd class="item-value">{{ $listing->position }}</dd>
                </div>
                <div class="item-wrapper">
                  <dt class="item-key">地域</dt>
                  <dd class="item-value">{{ __($listing->location) }}</dd>
                </div>
                <div class="item-wrapper">
                  <dt class="item-key">給与・賞与</dt>
                  <dd class="item-value">{{$listing->salary}}</dd>
                </div>
                <div class="px-4 py-6 sm:gap-4 sm:px-0">
                  <dt class="item-key">業務内容・メモ</dt>
                  <dd class="item-value py-4"><pre>{{ $listing->description }}</pre></dd>
                </div>
              </dl>
            </div>
            @include('listings.crud')
          </div>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
