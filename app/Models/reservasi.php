<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $fillable = ['chekin','chekout','total','namapem','email','no_hp','namatam','tipe','id_user'];
}
