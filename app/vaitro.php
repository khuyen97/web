<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vaitro extends Model
{
    protected $table = "vaitro";
    
    protected $fillable = [
        'vaitroID','tenvaitro'
    ];

    public $timestamps = false;
}
