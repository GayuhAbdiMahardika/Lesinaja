<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nama','email','password','no_telp','kota','alamat', 'token', 'role'];
}
