<div class="flex items-center flex-1 px-2 lg:ml-6 justify-end">
    <form action="/" class="w-full max-w-xs">
      <label for="search" class="sr-only">Search</label>
      <div class="relative">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <x-heroicon-o-magnifying-glass />
        </div>
        <input wire:model.live.debounce.500ms="search" id="search" name="search" class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-400 sm:text-sm sm:leading-6" placeholder="キーワード" type="search">
        <ul class="bg-white shadow w-full max-h-[18.375rem] absolute divide-y divide-slate-200 overflow-y-auto rounded-b-lg border-t border-slate-200 text-sm leading-6">
        @if (sizeof($results) > 0)
            <p class="p-4 text-gray-500">{{$results->count()}}件の検索結果を表示しています。</p>
            @foreach ($results as $result)
                <li class="break-all p-4">
                  <h3 class="font-semibold text-slate-900"><a href="/listings/{{$result->id}}">{{$result->title}}</a></h3>
                  <div class="mt-1 flex items-center flex-wrap gap-x-2 text-xs leading-5 text-gray-500">
                    <x-heroicon-o-briefcase />
                    <p>{{$result->company}}</p>
                    <x-heroicon-o-user-circle />
                    <p class="truncate">{{$result->position}}</p>
                    <x-heroicon-o-map-pin />
                    <p class="truncate">{{ __($result->location) }}</p>
                  </div>
                </li>
            @endforeach
         @endif
        </ul>
      </div>
    </form>
</div>
