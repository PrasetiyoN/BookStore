<?php

namespace App\Observers;

use App\Models\Buku;
use App\Models\Log;
class BukuObserver
{
    /**
     * Handle the Buku "created" event.
     *
     * @param  \App\Models\Buku  $buku
     * @return void
     */
    public function created(Buku $buku)
    {
        Log::create([
            'module' => 'tambah buku',
            'action' => 'tambah buku'.$buku->judul_buku.'dengan id'.$buku->id,
            'useraccess' => $buku->user_email
        ]);
    }

    /**
     * Handle the Buku "updated" event.
     *
     * @param  \App\Models\Buku  $buku
     * @return void
     */
    public function updated(Buku $buku)
    {
        Log::create([
            'module' => 'update buku',
            'action' => 'update buku'.$buku->judul_buku.'dengan id'.$buku->id,
            'useraccess' => $buku->user_email
        ]);
    }

    /**
     * Handle the Buku "deleted" event.
     *
     * @param  \App\Models\Buku  $buku
     * @return void
     */
    public function deleted(Buku $buku)
    {
        Log::create([
            'module' => 'delete buku',
            'action' => 'delete buku'.$buku->judul_buku.'dengan id'.$buku->id,
            'useraccess' => $buku->user_email
        ]);
    }

    /**
     * Handle the Buku "restored" event.
     *
     * @param  \App\Models\Buku  $buku
     * @return void
     */
    public function restored(Buku $buku)
    {
        //
    }

    /**
     * Handle the Buku "force deleted" event.
     *
     * @param  \App\Models\Buku  $buku
     * @return void
     */
    public function forceDeleted(Buku $buku)
    {
        //
    }
}
