<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'id';
    protected $fillable = ['kecamatan','kabupaten_id'];

    public function kabupaten()
    {
        return $this->hasMany(kabupaten::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(kelurahaan::class);
    }
}
