<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    public $timestamps = true;
    protected $table = "minuman";
    // protected $fillable = ['nama_makanan', 'harga_makanan', 'deskripsi_makanan', 'foto'];
    protected $guarded = ['id'];
}
