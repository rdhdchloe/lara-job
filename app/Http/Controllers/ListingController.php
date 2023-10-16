<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Support\Facades\Auth;

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
        $listings = Listing::latest()->get();
        return view('listings.index', compact('listings'));
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

        $listing = Listing::create(array_merge($request->validated(), ['user_id' => $user->id]));

        return redirect()->route('listings.show', $listing);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::find($id);
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

        $listing->update(array_merge($request->validated(),['user_id'=>$user->id]));

        return redirect()->route('listings.show', $listing);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect()->route('listings.index');
    }
}
