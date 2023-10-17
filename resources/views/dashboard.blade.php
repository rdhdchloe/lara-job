<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              @if (count(Auth::user()->listings) > 0)
                <p class="p-6 text-sm text-gray-900">
                  {{ Auth::user()->listings->count() }}件の求人投稿を表示しています。
                </p>

                <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            @foreach (Auth::user()->listings as $listing)
                            <ul role="list" class="divide-y divide-gray-100">
                                <li class="flex-center p-3 border rounded-md shadow my-3">
                                  <div class="min-w-0">
                                    <div class="">
                                      <a class="my-1 rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">Complete</a>
                                      <h3 class="text-sm font-semibold leading-6 text-gray-900">
                                        <a href="/listings/{{$listing->id}}">
                                        {{$listing->title}}
                                        </a>
                                      </h3>
                                    </div>
                                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                        <x-heroicon-o-briefcase />
                                        <p class="whitespace-nowrap">{{$listing->company}}</p>
                                        <x-heroicon-o-user-circle />
                                        <p class="truncate">{{$listing->position}}</p>
                                        <x-heroicon-o-map-pin />
                                        <p class="truncate">{{ __($listing->location) }}</p>
                                    </div>
                                  </div>
                                  @include('listings.crud')
                                </li>
                              </ul>
                            @endforeach
                        </ul>
                    @else
                        <p>投稿が見つかりませんでした。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
  