<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batikpedia extends Model
{
    use HasFactory;

    protected $table = "batikpedias";
    protected $fillable = [
        'nama',
        'asal',
        'deskripsi'
    ];
}
