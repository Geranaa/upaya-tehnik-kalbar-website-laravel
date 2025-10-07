<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $fillable = ['nama', 'divisi', 'jabatan', 'foto'];

}
