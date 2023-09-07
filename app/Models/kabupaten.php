<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';
    protected $primaryKey = 'id';
    protected $fillable = ['kabupaten','provinsi_id'];

    public function provinsi()
    {
        return $this->hasMany(provinsi::class);
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class);
    }
}
