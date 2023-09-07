<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita_kategori extends Model
{
    use HasFactory;

    protected $table = 'berita_kategori';
    protected $primaryKey = 'id';

    public function berita()
    {
        return $this->belongsTo(berita::class);
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
