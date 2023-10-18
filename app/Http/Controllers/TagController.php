<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $listings = $tag->listings()->paginate(10);
        return view('tags.show', compact('listings', 'tag'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $tags = Tag::where('name','like', '%' . $search . '%')->get();


        return response()->json($tags);
    }
}
