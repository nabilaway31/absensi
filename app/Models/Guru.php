<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp'
    ];

    // relasi ke tabel absensis (dipanggil sebagai absensis())
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'guru_id');
    }
}
