<?php

namespace App\Models;

use App\Models\Gambar;
use App\Models\Kondisi;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gambars() {
        return $this->hasOne(Gambar::class);
    }

    public function kategoris() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function kondisis() {
        return $this->belongsTo(Kondisi::class, 'kondisi_id');
    }
}
