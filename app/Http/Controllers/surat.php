<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pengguna;
use App\jenis_surat;
use App\surat_mahasiswa;
use App\surat_matkul;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use PDF;

class surat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim.*' => 'required|numeric|min:8',
            'nama.*' => 'required|alpha',
            'prodi.*' => 'required|alpha',
            'keperluan' => 'required',
            'tujuan' => 'required|alpha',
            'instansi' => 'required|alpha',
            'alamat' => 'required',
            'kota' => 'required|alpha',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'pemilik' => 'required|alpha',
            'no_hp' => 'required|numeric|min:11',
            'keterangan' => 'required',
        ]);

        $surat = new surat;

        $surat->id_jenis_surat = $request->keperluan;
        $surat->tujuan = $request->tujuan;
        $surat->instansi = $request->instansi;
        $surat->alamat = $request->alamat;
        $surat->kota = $request->kota;
        $surat->tgl_awal = $request->tgl_awal;
        $surat->tgl_akhir = $request->tgl_akhir;
        $surat->pemilik_no = $request->pemilik;
        $surat->no_hp = $request->no_hp;
        $surat->keterangan = $request->keterangan;

        $surat->save();
        
        $id_surat = $surat->id;
        $nama = $request->nama;
        $nim = $request->nim;
        $prodi = $request->prodi;
        
        $jumlah = count($nama);
        $data = [];
        for($i = 0; $i < $jumlah; $i++)
        {
            $data[] = [
                'nama' => $nama[$i],
                'nim' => $nim[$i],
                'prodi' => $prodi[$i],
                '$id_surat' => $id_surat,
            ];
        }
        surat_mahasiswa::insert($data);
        return redirect('/mahasiswa/ta')->with('success', 'Data Berhasil Ditambah');
    }

    public function store_matkul(Request $request)
    {
        $this->validate($request, [
            'nim.*' => 'required|numeric|min:8',
            'nama.*' => 'required|alpha',
            'prodi.*' => 'required|alpha',
            'matkul.*' => 'required|alpha',
            'keperluan' => 'required',
            'tujuan' => 'required|alpha',
            'instansi' => 'required|alpha',
            'alamat' => 'required',
            'kota' => 'required|alpha',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'pemilik' => 'required|alpha',
            'no_hp' => 'required|numeric|min:11',
            'keterangan' => 'required',
        ]);

        $surat = new surat;

        $surat->id_jenis_surat = $request->keperluan;
        $surat->tujuan = $request->tujuan;
        $surat->instansi = $request->instansi;
        $surat->alamat = $request->alamat;
        $surat->kota = $request->kota;
        $surat->tgl_awal = $request->tgl_awal;
        $surat->tgl_akhir = $request->tgl_akhir;
        $surat->pemilik_no = $request->pemilik;
        $surat->no_hp = $request->no_hp;
        $surat->keterangan = $request->keterangan;

        $surat->save();
        
        $id_surat = $surat->id;
        $matkul = $request->matkul;
        $nama = $request->nama;
        $nim = $request->nim;
        $prodi = $request->prodi;
        
        $jumlah = count($nama);
        $data = [];
        for($i = 0; $i < $jumlah; $i++){
            $data[] = [
                'nama' => $nama[$i],
                'nim' => $nim[$i],
                'prodi' => $prodi[$i],
                '$id_surat' => $id_surat,
            ];
        }
        surat_mahasiswa::insert($data);

        foreach($matkul as $i){
            $data[] = [
                'id_surat' => $id_surat,
                'mata_kuliah' => $i,
            ];
        }
        surat_matkul::insert($data);
        return redirect('/mahasiswa/matkul')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function showform()
    {
        $jenis_surat =  DB::table('jenis_surat as surat')
                        ->select('surat.*')
                        ->where('surat.jenis_surat','like','%Tugas Akhir%')
                        ->get();

        return view('mahasiswa.form_ta', compact('jenis_surat'));
    }

    public function showform_matkul()
    {
        $jenis_surat =  DB::table('jenis_surat as surat')
                        ->select('surat.*')
                        ->where('surat.jenis_surat','like','%Mata Kuliah%')
                        ->get();
                        
        return view('mahasiswa.form_matkul', compact('jenis_surat'));
    }

    public function cetak()
    {
        $bulan = array (1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember');
        $split = explode('-', date('d-m-Y'));
        $tanggal = $split[0].' '.$bulan[ (int) $split[1] ].' '.$split[2];

        $pdf = PDF::loadView('mahasiswa.cetak.ta_individu', compact('tanggal'));
        //dd($pdf);
	    return $pdf->download();

        // return view('mahasiswa.cetak.ta_individu', compact('tanggal'));
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
