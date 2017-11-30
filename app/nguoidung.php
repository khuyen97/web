<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    protected $table = "nguoidung";
    
    protected $fillable = [
        'nguoidungID','tennguoidung'
    ];

    public $timestamps = false;
}
