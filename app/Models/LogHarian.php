<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHarian extends Model
{
    use HasFactory;
    // public $timestamps = false;
    public $table='log_harian';
    public $fillable=['atasan_id','description','tgl_mulai','tgl_akhir','status','user_id'];
}
