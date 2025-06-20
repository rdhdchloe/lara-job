<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Listing;
use App\Models\ListingView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listings = Listing::latest()->paginate(10);
        $listings = Listing::latest()->with(['user', 'tags'])->filter(request()->only('search'))->paginate(10);
        $search = request('search');
        return view('listings.index', compact('listings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        $user = Auth::user();

        if(!$user){
            return redirect()->route('login')->with('error_message', 'ログインしてください');
        }

        $tagNames = explode(',', $request->input('tags'));
        $tagIds = Tag::getTagIds($tagNames);

        $listing = Listing::create(array_merge($request->validated(), ['user_id' => $user->id]));
        $listing->tags()->sync($tagIds);

        return redirect()->route('listings.show', $listing)->with('message', '求人を作成しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $listing = Listing::with('tags')->find($id);

        $user = $request->user();
        
        ListingView::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'listing_id' => $id,
            'user_id' => $user?->id
        ]);

        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::findOrFail($id);

        if(!$listing){
            return redirect('/listing');
        }

        return view('listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, string $id)
    {

        $listing = Listing::find($id);
        $this->authorize('update', $listing);
        $user = Auth::user();

        $tagNames = explode(',', $request->input('tags'));
        $tagIds = Tag::getTagIds($tagNames);
        
        $listing->update(array_merge($request->validated(),['user_id'=>$user->id]));
        $listing->tags()->sync($tagIds);

        return redirect()->route('listings.show', $listing)->with('message', '求人を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return redirect()->route('listings.index')->with('message', '求人を削除しました。');
    }
}
