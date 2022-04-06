<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Cow extends Model
{
    use HasFactory;
    protected $table = "cow";
    protected $guarded = ['id'];
    protected $fillable = [
        'kode', 'nama', 'bobot', 'tgl_lahir'
    ];
    public function age()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }
}
