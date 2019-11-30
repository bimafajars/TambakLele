<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "data_motordc";
    protected $fillable = ['id', 'nilai', 'kondisi'];
    public $timestamps = false;

}
