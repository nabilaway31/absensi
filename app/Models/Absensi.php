<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'tanggal',
        'jam_datang',
        'jam_pulang',
        'status',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
