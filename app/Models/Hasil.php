<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'no','user_id','id_proses','tanggal_awal','tanggal_akhir','min_support','min_confidence'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
    public function tanggalawal()
    {
        return $this->hasOne(Proses::class, 'tanggal_awal');
    }

    public function tanggalakhir()
    {
        return $this->hasOne(Proses::class, 'tanggal_akhir');
    }

    public function minsupport()
    {
        return $this->hasOne(Proses::class, 'min_support');
    }

    public function minconfidence()
    {
        return $this->hasOne(Proses::class, 'min_confidence');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
