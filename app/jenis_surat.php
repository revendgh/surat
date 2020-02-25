<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_surat extends Model
{
    protected $table = 'jenis_surat';
    protected $fillable = 
    [
    	'id',
    	'jenis_surat'
    ];

    public $timestamps = false;

    public function surat()
    {
    	return $this->hasMany('App\surat', 'id_jenis_surat', 'id');
    }
}
