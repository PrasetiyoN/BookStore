<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = ['judul_buku', 'penulis', 'gambar', 'harga', 'deskripsi', 'user_email', 'status_buku'];

    public function user(){
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
