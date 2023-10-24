@props(['tags'])
@if ($tags->count() > 0)
    <ul class="flex mb-3">
        @foreach($tags as $tag)
            <li class="mr-2 inline-flex items-center rounded-md bg-gray-100 px-1.5 py-0.5 text-xs font-medium text-gray-700 hover:text-gray-950">
                <a href="/tags/{{$tag->id}}">{{$tag->name}}</a>
            </li>
        @endforeach
    </ul>
@endif