<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookView extends Model
{
    use HasFactory;

    protected $table ='buku_view';

    public $timestamps = false;

    protected $fillable = ['email','nama','buku_idbuku'];
}
