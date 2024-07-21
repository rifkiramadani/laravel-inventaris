<?php

namespace App\Models;

use App\Models\Status;
use App\Models\Peminjam;
use App\Models\Inventaris;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function peminjams() {
        return $this->belongsTo(Peminjam::class, 'peminjam_id');
    }

    public function inventaris() {
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }

    public function statuses() {
        return $this->belongsToMany(Status::class)->withPivot('status_id');
    }
}
