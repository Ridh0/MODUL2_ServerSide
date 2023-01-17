<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'nama',
        'provinsi_id',
        'deskripsi',
        'url_foto'
    ];
}
