<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = true;
    protected $table = "kategori";
    // protected $fillable = ['nama','hp'];
    protected $guarded = ['id'];

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
