<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $image = Storage::disk('public')->put('profiles', $request->file('image'));
            $validated['image'] = $image;
        }

        return(Profile::create($validated));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $validated = $request->validated();
        if($request->hasFile('image')) {
            Storage::disk('public')->delete($profile->image);
            $image = Storage::disk('public')->put('profiles', $request->file('image'));
            $validated['image'] = $image;
        }

        $profile->update($validated);
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return "Profile deleted successfully.";
    }
}
