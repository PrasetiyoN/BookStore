<?php

namespace App\Observers;

use App\Models\Kategori;
use App\Models\Log;
class KategoriObserver
{
    /**
     * Handle the Kategori "created" event.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return void
     */

    public function created(Kategori $kategori)
    {
        Log::create([
            'module' => 'tambah Kategori',
            'action' => 'tambah Kategori'.$kategori->nama_kategori.'dengan id'.$kategori->id,
            'useraccess' => '-'
        ]);
    }

    /**
     * Handle the Kategori "updated" event.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return void
     */
    public function updated(Kategori $kategori)
    {
        Log::create([
            'module' => 'update kategori',
            'action' => 'update kategori'.$kategori->nama_kategori.'dengan id'.$kategori->id,
            'useraccess' => '-'
        ]);
    }

    /**
     * Handle the Kategori "deleted" event.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return void
     */
    public function deleted(Kategori $kategori)
    {
        Log::create([
            'module' => 'delete kategori',
            'action' => 'delete kategori'.$kategori->nama_kategori.'dengan id'.$kategori->id,
            'useraccess' => '-'
        ]);
    }

    /**
     * Handle the Kategori "restored" event.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return void
     */
    public function restored(Kategori $kategori)
    {
        //
    }

    /**
     * Handle the Kategori "force deleted" event.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return void
     */
    public function forceDeleted(Kategori $kategori)
    {
        //
    }
}
