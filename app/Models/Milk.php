<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milk extends Model
{
    use HasFactory;
    protected $table = "milk";
    protected $fillable = [
        'jumlah', 'tanggal', 'id_users', 'id_cow'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function cow()
    {
        return $this->belongsTo(User::class, 'id_cow', 'id');
    }
}
