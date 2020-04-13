<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_keterangan extends Model
{
    protected $table = 'surat_keterangan';
    protected $fillable = 
    [
        'id',
        'id_surat',
    	'keterangan'
    ];

    public $timestamps = false;

    public function surat()
    {
        return $this->belongsTo('App\surat', 'id_surat');
    }
}
