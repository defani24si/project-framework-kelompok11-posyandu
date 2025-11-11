<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;

    // Tentukan nama table yang benar
    protected $table = 'posyandu'; // tanpa 's'

    protected $fillable = [
        'nama', 'alamat', 'rt', 'rw', 'kontak'
    ];

    protected $primaryKey = 'posyandu_id';
}