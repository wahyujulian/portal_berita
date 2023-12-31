<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahaan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $primaryKey = 'id';
    protected $kelurahan = ['kelurahan','kecamatan_id'];

    public function kecamatan()
    {
        
        return $this->hasMany(kecamatan::class);
        
    }
}

