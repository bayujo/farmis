<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Cow extends Model
{
    use HasFactory;
    protected $table = "cow";
    protected $fillable = [
        'kode', 'nama', 'bobot', 'tgl_lahir'
    ];

    public function age()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'id_cow','id');
    }

    public function milk()
    {
        return $this->hasMany(Milk::class, 'id_cow', 'id');
    }
}
