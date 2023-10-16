<x-app-layout>
  <x-slot name="header">
    <h2 class="inline font-semibold text-xl text-gray-800 leading-tight">
      {{ $listing->title }}
    </h2>
    <div class="mt-2 flex items-center">
      <div class="mr-5 flex items-center">
        <x-heroicon-o-briefcase />
        <span class="ml-1 max-w-2xl text-gray-500 text-sm">{{ $listing->company }}</span>
      </div>
      <div class="flex items-center">
        <x-heroicon-o-link />
        <a href="{{$listing->url}}" target="_blank" class="ml-1 list hover:underline">{{$listing->url}}</a>
      </div>  
    </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-lg">
          <div class="border p-5 shadow rounded-md">
            {{-- <x-listing-tags :tags="$listing->tags"/> --}}
            <img src="{{asset('/images/no-image.png')}}" class="w-1/2 mx-auto" alt="">
            <div class="px-4 sm:px-0 flex-center text-sm leading-6">
              <p class="max-w-2xl font-semibold">{{ $listing->user->name }}</p>
              <time datetime="{{ $listing->created_at->toDateString() }}" class="text-gray-500">{{ $listing->created_at->format('Y-m-d') }}</time>
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
                <div class="item-wrapper">
                  <dt class="item-key">業務内容・メモ</dt>
                  <dd class="item-value">{{$listing->description}}</dd>
                </div>
              </dl>
            </div>
            @if (Auth::user()->id == $listing->user->id )
            <div class="flex justify-center rounded-md  text-center my-10">
                <a href="{{ route('listings.edit', $listing) }}" class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">編集</a>
                <form action="{{ route('listings.destroy', ['listing' => $listing->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="relative -ml-px inline-flex items-center rounded-r-md bg-white px-3 py-2 text-sm font-semibold text-red-500 ring-1 ring-inset ring-gray-300 hover:bg-red-50 focus:z-10">削除</button>
                </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
