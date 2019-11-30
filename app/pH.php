<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pH extends Model
{
    protected $fillable = ['id', 'waktu', 'nilai'];

    protected $table = 'data_ph';

}
