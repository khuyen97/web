<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoidungvaitro extends Model
{
    protected $table = "nguoidungvaitro";
    
    protected $fillable = [
        'nguoidungID','vaitroID','ngaycap'
    ];

    public $timestamps = false;

    public function nguoidung()
    {
        return $this->belongsTo('App\nguoidung', 'nguoidungID', 'nguoidungID');
    }

    public function vaitro()
    {
        return $this->belongsTo('App\vaitro', 'vaitroID', 'vaitroID');
    }
}
