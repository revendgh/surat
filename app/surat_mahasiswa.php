<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_mahasiswa extends Model
{

	protected $table = 'surat_mahasiswa';
    protected $fillable = 
    [
        'id',
    	'id_surat',
        'nim',
        'nama',
        'prodi',
        'tempat',
        'tgl_lahir',
        'alamat_asal',
        'alamat_skrg'
    ];

    public $timestamps = false;

    public function surat()
    {
        return $this->belongsTo('App\surat', 'id_surat');
    }
}
