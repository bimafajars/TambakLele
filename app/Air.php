<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Air extends Model
{
    protected $fillable = ['id', 'waktu', 'nilai'];

    protected $table = 'data_jarak';
}
