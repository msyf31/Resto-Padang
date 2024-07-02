<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    public $timestamps = true;
    protected $table = "makanan";
    // protected $fillable = ['nama_makanan', 'harga_makanan', 'deskripsi_makanan', 'foto'];
    protected $guarded = ['id'];
}
