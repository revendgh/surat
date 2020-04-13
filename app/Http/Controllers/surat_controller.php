<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\surat;
use App\pengguna;
use App\jenis_surat;
use App\surat_mahasiswa;
use App\surat_matkul;
use App\surat_keterangan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use PDF;

class surat_controller extends Controller
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
    public function create_ta()
    {
        $jenis_surat =  DB::table('jenis_surat as surat')
                        ->select('surat.*')
                        ->where('surat.jenis_surat','like','%Tugas Akhir%')
                        ->get();

        return view('mahasiswa.form_ta', compact('jenis_surat'));
    }

    public function create_matkul()
    {
        $jenis_surat =  DB::table('jenis_surat as surat')
                        ->select('surat.*')
                        ->where('surat.jenis_surat','like','%Mata Kuliah%')
                        ->get();
                        
        return view('mahasiswa.form_matkul', compact('jenis_surat'));
    }

    public function create_sp()
    {
        return view('mahasiswa.form_sp_tmb');
    }

    public function create_sk()
    {
        return view('mahasiswa.form_sk');
    }

    public function create_ta_dpm()
    {
        return view('mahasiswa.form_ta_dpm');
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
            'nim.*' => 'required|digits:8',
            'nama.*' => 'required|regex:/^[\pL\s\-]+$/u',
            'prodi.*' => 'required|regex:/^[\pL\s\-]+$/u',
            'keterangan.*' => 'required|string',
            'keperluan' => 'required',
            'tujuan' => 'required|string',
            'instansi' => 'required|string',
            'alamat' => 'required',
            'kota' => 'required|regex:/^[\pL\s\-]+$/u',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'pemilik' => 'required|regex:/^[\pL\s\-]+$/u',
            'no_hp' => 'required|digits_between:11,12',
        ]);

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
        $mentah_awal = explode('-', $request->tgl_awal);
        $mentah_akhir = explode('-', $request->tgl_akhir);

        $tgl_awal = $mentah_awal[2].' '.$bulan[ (int) $mentah_awal[1] ].' '.$mentah_awal[0];
        $tgl_akhir = $mentah_akhir[2].' '.$bulan[ (int) $mentah_akhir[1] ].' '.$mentah_akhir[0];

        $surat = new surat;

        $surat->id_jenis_surat = $request->keperluan;
        $surat->tujuan = $request->tujuan;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat;
        $surat->kab_kota = $request->kota;
        $surat->tgl_awal = $tgl_awal;
        $surat->tgl_akhir = $tgl_akhir;
        $surat->pemilik_no = $request->pemilik;
        $surat->no_hp = $request->no_hp;

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
                'id_surat' => $id_surat,
            ];
        }
        surat_mahasiswa::insert($data);

        $keterangan = $request->keterangan;

        foreach($keterangan as $i){
            $ket[] = [
                'id_surat' => $id_surat,
                'keterangan' => $i,
            ];
        }
        surat_keterangan::insert($ket);
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }

    public function store_matkul(Request $request)
    {
        $this->validate($request, [
            'nim.*' => 'required|digits:8',
            'nama.*' => 'required|regex:/^[\pL\s\-]+$/u',
            'prodi.*' => 'required|regex:/^[\pL\s\-]+$/u',
            'matkul.*' => 'required|string',
            'keterangan.*' => 'required|string',
            'keperluan' => 'required',
            'tujuan' => 'required|string',
            'instansi' => 'required|string',
            'alamat' => 'required',
            'kota' => 'required|regex:/^[\pL\s\-]+$/u',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'pemilik' => 'required|regex:/^[\pL\s\-]+$/u',
            'no_hp' => 'required|digits_between:11,12',
        ]);

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
        $mentah_awal = explode('-', $request->tgl_awal);
        $mentah_akhir = explode('-', $request->tgl_akhir);

        $tgl_awal = $mentah_awal[2].' '.$bulan[ (int) $mentah_awal[1] ].' '.$mentah_awal[0];
        $tgl_akhir = $mentah_akhir[2].' '.$bulan[ (int) $mentah_akhir[1] ].' '.$mentah_akhir[0];

        $surat = new surat;

        $surat->id_jenis_surat = $request->keperluan;
        $surat->tujuan = $request->tujuan;
        $surat->instansi = $request->instansi;
        $surat->alamat_instansi = $request->alamat;
        $surat->kab_kota = $request->kota;
        $surat->tgl_awal = $tgl_awal;
        $surat->tgl_akhir = $tgl_akhir;
        $surat->pemilik_no = $request->pemilik;
        $surat->no_hp = $request->no_hp;

        $surat->save();
        
        $id_surat = $surat->id;
        $matkul = $request->matkul;
        $nama = $request->nama;
        $nim = $request->nim;
        $prodi = $request->prodi;
        $keterangan = $request->keterangan;
        
        $jumlah = count($nama);
        $data = [];
        for($i = 0; $i < $jumlah; $i++){
            $data[] = [
                'nama' => $nama[$i],
                'nim' => $nim[$i],
                'prodi' => $prodi[$i],
                'id_surat' => $id_surat,
            ];
        }
        surat_mahasiswa::insert($data);

        foreach($matkul as $i){
            $insert_matkul[] = [
                'id_surat' => $id_surat,
                'mata_kuliah' => $i,
            ];
        }
        surat_matkul::insert($insert_matkul);

        foreach($keterangan as $i){
            $insert_keterangan[] = [
                'id_surat' => $id_surat,
                'keterangan' => $i,
            ];
        }
        surat_keterangan::insert($insert_keterangan);
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }

    public function store_sk(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|digits:8',
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'prodi' => 'required|regex:/^[\pL\s\-]+$/u',
            'keperluan' => 'required|string',
            'semester' => 'required',
            'tahun' => 'required',
        ]); 

        $surat = new surat;
        $mahasiswa = new surat_mahasiswa;

        $surat->id_jenis_surat = 1;
        $surat->keterangan = $request->keperluan;
        $surat->semester = $request->semester;
        $surat->tahun_akademik = $request->tahun;

        $surat->save();

        $mahasiswa->id_surat = $surat->id;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->prodi = $request->prodi;

        $mahasiswa->save();
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }

    public function store_sp(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|digits:8',
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'prodi' => 'required|regex:/^[\pL\s\-]+$/u',
            'tempat_lahir' => 'required|regex:/^[\pL\s\-]+$/u',
            'tgl_lahir' => 'required|date',
            'semester' => 'required|numeric',
            'ipk' => 'required|between:0,4.00',
            'tahun' => 'required',
            'alamat_asal' => 'required|string',
            'alamat_skrg' => 'required|string',
            'no_hp' => 'required|digits_between:11,12',
        ]);
        
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
        $mentah_awal = explode('-', $request->tgl_lahir);
        $tgl_lahir = $mentah_awal[2].' '.$bulan[ (int) $mentah_awal[1] ].' '.$mentah_awal[0];

        $surat = new surat;
        $mahasiswa = new surat_mahasiswa;

        $surat->id_jenis_surat = 7;
        $surat->semester = $request->semester;
        $surat->ipk = $request->ipk;
        $surat->tahun_akademik = $request->tahun;
        $surat->no_hp = $request->no_hp;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->tempat = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $tgl_lahir;
        $mahasiswa->alamat_asal = $request->alamat_asal;
        $mahasiswa->alamat_skrg = $request->alamat_skrg;

        $surat->save();
        
        $mahasiswa->id_surat = $surat->id;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }
    
    public function store_ta_dpm(Request $request)
    {
        $this->validate($request, [
            'nim_p' => 'required|digits:8',
            'nama_p' => 'required|regex:/^[\pL\s\-]+$/u',
            'prodi_p' => 'required|regex:/^[\pL\s\-]+$/u',
            'alamat' => 'required|string',
            'no_mhs' => 'required|digits_between:11,12',
            'judul' => 'required|string',
            'instansi' => 'required|string',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'dosen' => 'required|string',
            'jabatan' => 'required|regex:/^[\pL\s\-]+$/u',
            'no_dosen' => 'required|digits_between:11,12',
        ]);

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
        $mentah_awal = explode('-', $request->tgl_awal);
        $mentah_akhir = explode('-', $request->tgl_akhir);

        $tgl_awal = $mentah_awal[2].' '.$bulan[ (int) $mentah_awal[1] ].' '.$mentah_awal[0];
        $tgl_akhir = $mentah_akhir[2].' '.$bulan[ (int) $mentah_akhir[1] ].' '.$mentah_akhir[0];
        
        $surat = new surat;
        $mahasiswa = new surat_mahasiswa;

        $surat->id_jenis_surat = 6;
        $surat->no_hp = $request->no_mhs;
        $surat->tgl_awal = $tgl_awal;
        $surat->tgl_akhir = $tgl_akhir;
        $surat->judul_ta = $request->judul;
        $surat->instansi = $request->instansi;
        $surat->dosen = $request->dosen;
        $surat->jabatan_dosen = $request->jabatan;
        $surat->no_dosen = $request->no_dosen;
        $mahasiswa->nim = $request->nim_p;
        $mahasiswa->nama = $request->nama_p;
        $mahasiswa->prodi = $request->prodi_p;
        $mahasiswa->alamat_skrg = $request->alamat;

        // dd($surat, $mahasiswa);
        
        $surat->save();
        $mahasiswa->id_surat = $surat->id;
        
        $mahasiswa->save();
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data = DB::table('surat')
                    ->select('surat.*', 'jenis.*')
                    ->where('surat.id', '=', '28')
                    ->join('jenis_surat as jenis', 'jenis.id', '=', 'surat.id_jenis_surat')
                    ->get();
        $mahasiswa = DB::table('surat_mahasiswa as mahasiswa')
                    ->select('mahasiswa.*')
                    ->where('id_surat', '28')
                    ->get();
        $matkul = DB::table('surat_matkul as matkul')
                    ->select('matkul.*')
                    ->where('id_surat', '28')
                    ->get();
        $keterangan = DB::table('surat_keterangan as keterangan')
                    ->select('keterangan.*')
                    ->where('id_surat', '28')
                    ->get();            
        $count_mhs = count($mahasiswa);
        $count_matkul = count($matkul)-1;
        $count_ket = count($keterangan);

        foreach($data as $i)
            $id_surat = $i->id_jenis_surat;
        
        if ($id_surat == 1) {
            $pdf = PDF::loadView('cetak.surat_sk', compact('tanggal','mahasiswa','data'));
            return $pdf->stream('SK Aktif Kuliah.pdf');
        }
        elseif ($id_surat == 2 || $id_surat == 3) {
            $pdf = PDF::loadView('cetak.surat_ta', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
            return $pdf->stream('Surat Permohonan TA.pdf');

            return view('cetak.surat_ta', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
        }
        elseif ($id_surat == 4 || $id_surat == 5)
        {
            $pdf = PDF::loadView('cetak.surat_matkul', compact('tanggal','mahasiswa','data','count_mhs','count_matkul','matkul','keterangan'));
            return $pdf->stream('Surat Permohonan Matkul.pdf');

            return view('cetak.surat_matkul', compact('tanggal','mahasiswa','data','count_mhs','count_matkul','matkul','keterangan'));
        }
        elseif ($id_surat == 7)
        {
            $pdf = PDF::loadView('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
            return $pdf->stream('Surat Pernyataan.pdf');

            return view('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
        }
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
