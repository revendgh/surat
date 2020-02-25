<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
     protected $table = 'surat';
    
    protected $fillable = 
    [
    	'id',
		'id_jenis_surat',
		'tujuan',
    	'instansi',
    	'alamat_instansi',
    	'kab_kota',
    	'tgl_awal',
    	'tgl_akhir',
    	'no_hp',
    	'pemilik_no',
    	'keterangan',
    	'created_at',
    	'updated_at'
    ];

    public function jenis_surat()
    {
    	return $this->belongsTo('App\jenis_surat', 'id_jenis_surat'); 	
    }

    public function surat_mahasiswa()
    {
    	return $this->hasMany('App\surat_mahasiswa', 'id_surat', 'id'); 	
    }
}
