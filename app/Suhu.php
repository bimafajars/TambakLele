<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    protected $table = 'data_suhu';
    protected $fillable = ['id', 'waktu', 'nilai'];
}
