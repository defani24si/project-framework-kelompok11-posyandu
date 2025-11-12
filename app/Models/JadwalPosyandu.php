<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPosyandu extends Model
{
    use HasFactory;

    protected $table = 'jadwal_posyandu';

    // Primary key sesuai tabel
    protected $primaryKey = 'jadwal_id';
    public $incrementing = true;  // auto-increment
    protected $keyType = 'int';

    protected $fillable = [
        'posyandu_id',
        'tanggal',
        'tema',
        'keterangan'
    ];

    // Relasi ke Posyandu
    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class, 'posyandu_id', 'posyandu_id');
    }
}
