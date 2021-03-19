<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['nama','email','gender','password','no_telp','id_kota','alamat'];
}
