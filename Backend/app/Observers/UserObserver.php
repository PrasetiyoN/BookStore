<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Log;

class UserObserver
{
    /**
     * Handle the UserObserver "created" event.
     */
    public function creating(User $user)
    {
        $user->last_login = now();
    }

    public function created(User $user)
    {

        Log::create([
            'module' => 'register',
            'action' => 'registrasi akun',
            'useraccess' => $user->email
        ]);
    }
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
