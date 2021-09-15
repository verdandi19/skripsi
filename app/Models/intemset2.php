<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intemset2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proses','kombinasiItem','jumlahItem','jumlahTransaksi','persen','hasil','minSupport'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
