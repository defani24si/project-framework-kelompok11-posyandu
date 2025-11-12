<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;

    protected $table = 'posyandu';

    // Primary key sesuai tabel
    protected $primaryKey = 'posyandu_id';
    public $incrementing = true;   // auto-increment
    protected $keyType = 'int';    // tipe integer

    protected $fillable = [
        'nama',
        'alamat',
        'rt',
        'rw',
        'kontak'
    ];

    // Relasi ke jadwal
    public function jadwals()
    {
        return $this->hasMany(JadwalPosyandu::class, 'posyandu_id', 'posyandu_id');
    }
}
