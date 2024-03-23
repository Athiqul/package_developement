<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */

    public function created(User $user): void
    {
        $title="{$user->name} Account Created!";
        $description="{$user->name} Account Created! at {$user->created_at} user email address {$user->email}";
        Activity::create(
            [

                'title' => $title,
                'description' => $description,
            ]
        );
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
         if($user->wasChanged('password'))
         {
             $title="{$user->name} password Updated!";
             $description="{$user->name} password Updated! at {$user->updated_at}";
             Activity::create(
                 [

                     'title' => $title,
                     'description' => $description,
                 ]
             );
         }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
