<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->safe()->only(['name', 'email']));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if($currentImage = $request->user()->image){
            // Storage::disk('public')->delete($currentImage);
            Storage::disk('s3')->delete($currentImage);
        }

        $path = null;
        if ($request->hasFile('image')) {
            // $path = $request->file('image')->store('uploads', 'public');
            // $path = $request->file('image')->store('uploads', 's3');
            // $request->user()->image = $path;
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('uploads', $image, 'public');
        }

        $request->user()->image = Storage::disk('s3')->url($path);
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
