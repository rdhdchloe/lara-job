@props(['tags'])

<ul class="flex">
    @foreach($tags as $tag)
        <li class="mr-2 inline-flex items-center rounded-md bg-gray-100 px-1.5 py-0.5 text-xs font-medium text-gray-700 hover:text-gray-950">
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>