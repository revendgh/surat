@extends('admin.layout.app')

@section('content')

<!-- CONTENT -->
<div id="content">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="card">
    <div class="card-body">
        <h2><center>Pengajuan Surat Mahasiswa</center></h2>
        @if(\Session::get('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success')}}</p>
        </div>
        @endif
        <div class="form-group">
            <table id="list" width="100%">
                <thead>
                    <td colspan="3"><label for="mahasiswa">DATA PEMOHON</label></td>
                </thead>
                @foreach ($mahasiswa as $data => $mahasiswa)
                <tr>
                    <td>{{$data + 1}}.</td>
                    <td><input type="text" maxlength="8" name="nim" value="{{$mahasiswa->nim}}" class="form-control" readonly></td>
                    <td><input type="text" name="nama" value="{{$mahasiswa->nama}}" class="form-control" readonly></td>
                    <td><input type="text" name="prodi" value="{{$mahasiswa->prodi}}" class="form-control" readonly></td>  
                </tr>
                @endforeach  
            </table>
        </div>
        @if ($jumlah_mk != 0)
            <div class="form-group">
                <table id="list-matkul" width="100%">
                    <thead>
                        <td colspan="2"><label for="matkul">MATA KULIAH</label></td>
                    </thead>
                    @foreach ($matkul as $data => $matkul)
                    <tr>
                        <td width="2%">{{$data + 1}}.</td>
                        <td><input type="text" name="matkul" value="{{$matkul->mata_kuliah}}" class="form-control" readonly></td>  
                    </tr>
                    @endforeach  
                </table>
            </div>
        @endif
        @foreach ($surat as $data)
        <div class="form-group">
            <label for="keperluan">KEPERLUAN</label><br>
                <input type="text" name="keperluan" value="{{$data->jenis}}" class="form-control" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tujuan">TUJUAN SURAT</label>
                    <input type="text" name="tujuan" value="{{$data->tujuan}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="instansi">INSTANSI</label>
                    <input type="text" name="instansi" value="{{$data->instansi}}" class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="alamat">ALAMAT INSTANSI</label>
                    <input type="text" name="alamat" value="{{$data->alamat_instansi}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="kab_kota">KABUPATEN/KOTA</label>
                    <input type="text" name="kab_kota" value="{{$data->kab_kota}}" class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="tgl_awal">TANGGAL MULAI</label>
                    <input type="text" name="tgl_awal" value="{{$data->tgl_awal}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="tgl_akhir">TANGGAL SELESAI</label>
                    <input type="text" name="tgl_awal" value="{{$data->tgl_akhir}}" class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pemilik">PEMILIK NO.</label>
                    <input type="text" name="pemilik" value="{{$data->pemilik_no}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="no_hp">NO. HANDPHONE</label>
                <input type="text" name="no_hp" value="{{$data->no_hp}}" class="form-control" readonly>
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <table id="list-keterangan" width="100%">
                <thead>
                    <td colspan="2"><label for="keterangan">KETERANGAN PEMOHON</label></td>
                </thead>
                @foreach ($keterangan as $data => $keterangan)
                <tr>
                    <td width="2%">{{$data + 1}}.</td>
                    <td><input type="text" name="matkul" value="{{$keterangan->keterangan}}" class="form-control" readonly></td>  
                </tr>
                @endforeach 
            </table>
        </div>
        <br>
        @foreach ($surat as $data => $surat)
        <div class="row">
            @if ($surat->status == null)
                <div class="col-sm-8">
                    <a href="/admin/dashboard" class="btn btn-primary"><b><- Kembali</b></a>
                </div>
                <div class="col-sm-2">
                    <a href="{{url('/admin/tolak/'.$surat->id)}}" class="btn btn-danger form-control"><b>Tolak</b></a>
                </div>
                <div class="col-sm-2" style="text-align: right">
                    <a href="{{url('/admin/terima/'.$surat->id)}}" class="btn btn-success form-control"><b>Terima</b></a>
                </div>
            @else
                <div class="col-sm-8">
                    <a href="/admin/arsip" class="btn btn-primary"><b><- Kembali</b></a>
                </div>
                <div class="col-sm-4" style="text-align: right">
                    <a href="{{url('/admin/cetak/'.$surat->id)}}" class="btn btn-success form-control"><b>Cetak</b></a>
                </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

@endsection
