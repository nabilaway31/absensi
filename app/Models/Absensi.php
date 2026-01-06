<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    // allow mass assignment for these fields
    protected $fillable = [
        'guru_id',
        'tanggal',
        'status'
    ];

    // relasi ke guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
