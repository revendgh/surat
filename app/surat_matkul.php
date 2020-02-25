<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_matkul extends Model
{
    protected $table = 'surat_mahasiswa';
    protected $fillable = 
    [
        'id',
        'id_surat',
    	'id_matkul'
    ];

    public $timestamps = false;

    public function surat()
    {
        return $this->belongsTo('App\surat', 'id_surat');
    }
}
