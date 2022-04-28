<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedule";
    protected $fillable = [
        'judul', 'tanggal', 'id_users', 'id_cow', 'status'
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