<?php

namespace App\Observers;

use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileObserver
{
    /**
     * Handle the Profile "created" event.
     */
    public function created(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "updated" event.
     */
    public function updated(Profile $profile): void
    {
        if($profile->isDirty('image')) {
            $oldImage = $profile->getOriginal('image');
            if(isset($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }
    }

    /**
     * Handle the Profile "deleted" event.
     */
    public function deleted(Profile $profile): void
    {
    }

    /**
     * Handle the Profile "restored" event.
     */
    public function restored(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "force deleted" event.
     */
    public function forceDeleted(Profile $profile): void
    {
        if(isset($profile->image))
        {
            Storage::disk('public')->delete($profile->image);
        }
    }
}
