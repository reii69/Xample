<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;
    protected $table = 'nama_bulan_status_action';

    protected $fillable = [
        'user_id',
        'name',
        'bulan',
        'status',
        'nominal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
