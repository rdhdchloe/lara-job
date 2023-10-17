@if (Auth::user()->id == $listing->user->id )
    <div class="flex justify-center rounded-md  text-center my-5 flex-shrink-0">
        <a href="{{ route('listings.edit', $listing) }}" class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">編集</a>
        <form action="{{ route('listings.destroy', ['listing' => $listing->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex-shrink-0 relative -ml-px inline-flex items-center rounded-r-md bg-white px-3 py-2 text-sm font-semibold text-red-500 ring-1 ring-inset ring-gray-300 hover:bg-red-50 focus:z-10">削除</button>
        </form>
    </div>
@endif