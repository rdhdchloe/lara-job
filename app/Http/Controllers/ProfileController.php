<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
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
            $request->user()->image = Storage::disk('s3')->url($path);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Generate avatar w/ openAI
     */
    public function generateAvatar(ProfileUpdateRequest $request)
    {
        $avatar = OpenAI::images()->create([
            "prompt" => "animated avatar with fun colors",
            "n" => 1,
            "size" => "256x256",
        ]);
    
        $url = $avatar->data[0]->url;
    
        $filename = Str::random(10);
        $path = "uploads/$filename.jpg";
    
        if ($currentImage = $request->user()->image) {
            Storage::disk('s3')->delete($currentImage);
        }
    
        // Use put() with fopen() to save the image from the URL to S3
        Storage::disk('s3')->put($path, fopen($url, 'r'), 'public');
    
        // Save the S3 URL to a variable
        $s3Url = Storage::disk('s3')->url($path);
    
        // Update the user's 'image' attribute with the S3 URL
        $request->user()->image = $s3Url;
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
