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
        $surat->date_expired = $request->tgl_awal;

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
        $surat->date_expired = $request->tgl_awal;

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

        $expired = date_add(now(), date_interval_create_from_date_string("10 days"));

        $surat = new surat;
        $mahasiswa = new surat_mahasiswa;

        $surat->id_jenis_surat = 1;
        $surat->keterangan = $request->keperluan;
        $surat->semester = $request->semester;
        $surat->tahun_akademik = $request->tahun;
        $surat->date_expired = $expired;

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

        $expired = date_add(now(), date_interval_create_from_date_string("10 days"));
        $surat = new surat;
        $mahasiswa = new surat_mahasiswa;

        $surat->id_jenis_surat = 7;
        $surat->semester = $request->semester;
        $surat->ipk = $request->ipk;
        $surat->tahun_akademik = $request->tahun;
        $surat->no_hp = $request->no_hp;
        $surat->date_expired = $expired;
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
        $surat->date_expired = $request->tgl_awal;
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
                    ->where('surat.id', '=', '30')
                    ->join('jenis_surat as jenis', 'jenis.id', '=', 'surat.id_jenis_surat')
                    ->get();
        $mahasiswa = DB::table('surat_mahasiswa as mahasiswa')
                    ->select('mahasiswa.*')
                    ->where('id_surat', '30')
                    ->get();
        $matkul = DB::table('surat_matkul as matkul')
                    ->select('matkul.*')
                    ->where('id_surat', '30')
                    ->get();
        $keterangan = DB::table('surat_keterangan as keterangan')
                    ->select('keterangan.*')
                    ->where('id_surat', '30')
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
        elseif ($id_surat == 6) {
            $pdf = PDF::loadView('cetak.surat_ta_dpm', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
            return $pdf->stream('Surat Permohonan TA DPM.pdf');

            return view('cetak.surat_ta', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
        }
        elseif ($id_surat == 7)
        {
            $pdf = PDF::loadView('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
            return $pdf->stream('Surat Pernyataan.pdf');

            return view('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
        }
    }

    //-------------------------- admin ----------------------//

    public function index_admin()
    { 
        $master =   DB::select(DB::raw("SELECT a.id, a.created_at, b.nim as nim, b.nama as nama, b.prodi as prodi, c.jenis_surat
        FROM surat AS a, surat_mahasiswa AS b, jenis_surat AS c
        WHERE a.id_jenis_surat = c.id and
                a.id = b.id_surat and
                a.status IS NULL
        GROUP BY b.id_surat
        ORDER BY a.created_at ASC"));

        return view('admin.dashboard', compact('master'));
    }

    public function show_admin($id)
    {
        $surat = DB::select("Select a.*, b.jenis_surat as jenis
        from surat as a, jenis_surat as b
        where a.id_jenis_surat = b.id and
              a.id = '$id'");

        $ketua = DB::select("SELECT a.*
        FROM surat_mahasiswa AS a, surat AS b
        WHERE a.id_surat = b.id AND
                a.id_surat = '$id'
        GROUP BY a.id_surat");

        $anggota = DB::select("SELECT a.nama AS nama
        FROM surat_mahasiswa AS a, surat AS b
        WHERE a.id_surat = b.id AND
                a.id_surat = '$id' and
                a.nama <> (SELECT a.nama AS nama
        FROM surat_mahasiswa AS a, surat AS b
        WHERE a.id_surat = b.id AND
                a.id_surat = '$id'
        GROUP BY a.id_surat)");

        $mahasiswa = DB::select("Select a.*
        from surat_mahasiswa as a, surat as b
        where a.id_surat = b.id and
              a.id_surat = '$id'");
        
        $keterangan = DB::select("Select a.*
        from surat_keterangan as a, surat as b
        where a.id_surat = b.id and
              a.id_surat = '$id'");
        
        $matkul = DB::select("Select a.*
        from surat_matkul as a, surat as b
        where a.id_surat = b.id and
              a.id_surat = '$id'");

        $jumlah_mhs = DB::select("Select count(a.id_surat) as jumlah
        from surat_mahasiswa as a, surat as b
        where a.id_surat = b.id and
              a.id_surat = '$id'");
        
        $jumlah_matkul = DB::select("Select count(a.id_surat) as jumlah
        from surat_matkul as a, surat as b
        where a.id_surat = b.id and
              a.id_surat = '$id'");

        foreach($surat as $data)
            $id_jenis = $data->id_jenis_surat;

        foreach($jumlah_mhs as $data)
            $jumlah = $data->jumlah;
        
        foreach($jumlah_matkul as $data)
            $jumlah_mk = $data->jumlah;

        if($id_jenis == 1)
            return view('admin.detail_sk_aktif', compact('surat', 'mahasiswa'));
        
        elseif($id_jenis == 6)
            return view('admin.detail_dpm', compact('surat', 'jumlah','ketua', 'anggota'));
        
        elseif($id_jenis == 7)
            return view('admin.detail_sp', compact('surat', 'mahasiswa'));
        
        else
            return view('admin.detail', compact('surat', 'mahasiswa','jumlah_mhs', 'jumlah_mk', 'matkul', 'keterangan'));
    }

    public function index_arsip()
    {
        $master =   DB::select(DB::raw("SELECT a.id, a.updated_at, b.nim as nim, b.nama as nama, b.prodi as prodi, c.jenis_surat
        FROM surat AS a, surat_mahasiswa AS b, jenis_surat AS c
        WHERE a.id_jenis_surat = c.id and
                a.id = b.id_surat and
                a.status = 1
        GROUP BY b.id_surat
        ORDER BY a.created_at ASC"));

        return view('admin.arsip', compact('master'));
    }

    public function update_admin_terima($id)
    {
        $query = DB::table('surat')
                    ->where('id', $id)
                    ->update(['status' => 1], ['updated_at' => now()]);
        
        return redirect('/admin/pemohon/'.$id)->with('success', 'Data Berhasil Diverifikasi');
    }

    public function update_admin_tolak($id)
    {
        $query = DB::table('surat')
                    ->where('id', $id)
                    ->update(['status' => 0]);
        
        return redirect('/admin/dashboard')->with('success', 'Data Berhasil Diverifikasi');
    }

    public function cetak_admin($id)
    {
        $data = DB::table('surat')
                    ->select('surat.*', 'jenis.*')
                    ->where('surat.id', $id)
                    ->join('jenis_surat as jenis', 'jenis.id', '=', 'surat.id_jenis_surat')
                    ->get();
        $mahasiswa = DB::table('surat_mahasiswa as mahasiswa')
                    ->select('mahasiswa.*')
                    ->where('id_surat', $id)
                    ->get();
        $matkul = DB::table('surat_matkul as matkul')
                    ->select('matkul.*')
                    ->where('id_surat', $id)
                    ->get();
        $keterangan = DB::table('surat_keterangan as keterangan')
                    ->select('keterangan.*')
                    ->where('id_surat', $id)
                    ->get();            
        $count_mhs = count($mahasiswa);
        $count_matkul = count($matkul)-1;
        $count_ket = count($keterangan);

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

        foreach($data as $surat)
        {   
            $tes = \Carbon\Carbon::parse($surat->created_at); 
            $mentah_awal = explode('-', $tes->format('Y-m-d'));
            $tanggal = $mentah_awal[2].' '.$bulan[ (int) $mentah_awal[1] ].' '.$mentah_awal[0];
        }

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
        elseif ($id_surat == 6) {
            $pdf = PDF::loadView('cetak.surat_ta_dpm', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
            return $pdf->stream('Surat Permohonan TA DPM.pdf');

            return view('cetak.surat_ta', compact('tanggal','mahasiswa','data','count_mhs','keterangan'));
        }
        elseif ($id_surat == 7)
        {
            $pdf = PDF::loadView('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
            return $pdf->stream('Surat Pernyataan.pdf');

            return view('cetak.surat_tmb', compact('tanggal','mahasiswa','data','count_mhs'));
        }
    }
}
