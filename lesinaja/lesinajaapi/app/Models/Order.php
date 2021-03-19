<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_user', 'email_user', 'id_guru', 'jenjang_pendidikan', 'jenjang_kelas', 'durasi_belajar', 'total_bulan','hari','jam_mulai', 'pertemuan_pertama', 'prefrensi_gender_guru', 'pesan_tambahan'];
}
