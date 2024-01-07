<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    //  public $timestamps = false;
     public $table='biodata';
     public $fillable=['nama','kabupaten','kecamatan','kelurahan','user_id'];
}
