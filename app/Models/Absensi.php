<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = [
        'guru_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
