<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_matkul extends Model
{
    protected $table = 'surat_matkul';
    protected $fillable = 
    [
        'id',
        'id_surat',
    	'mata_kuliah'
    ];

    public $timestamps = false;

    public function surat()
    {
        return $this->belongsTo('App\surat', 'id_surat');
    }
}
