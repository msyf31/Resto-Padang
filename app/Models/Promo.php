<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    public $timestamps = true;
    protected $table = "promo";
    // protected $fillable = ['nama_promo'];
    protected $guarded = ['id'];
}
