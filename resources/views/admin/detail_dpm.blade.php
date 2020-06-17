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
        <div class="row">
            <div class="col">
                <label for="mahasiswa">DATA PEMOHON</label>
            </div>
        </div>
        @foreach ($ketua as $data)
            <div class="form-row">
                <div class="form-group col-md-4">
                        <input type="text" name="nim_p" value="{{$data->nim}}" class="form-control" readonly>                    
                </div>
                <div class="form-group col-md-4">
                    <label for="semester" hidden>DATA MAHASISWA</label>
                        <input type="text" name="nama_p" value="{{$data->nama}}" class="form-control" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="semester" hidden>DATA MAHASISWA</label>
                        <input type="text" name="prodi_p" value="{{$data->prodi}}" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">ALAMAT PENELITI</label>
                    <input type="text" name="alamat" value="{{$data->alamat_skrg}}" class="form-control" readonly>
            </div>
        @endforeach
        @foreach ($surat as $data)
        <div class="form-group">
            <label for="no_mhs">NO. TELEPON PENELITI</label>
                <input type="text" name="no_mhs" value="{{$data->no_hp}}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="judul">JUDUL PENELITIAN</label>
                <input type="text" name="judul" value="{{$data->judul_ta}}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="instansi">LOKASI PENELITIAN</label>
                <input type="text" name="instansi" value="{{$data->instansi}}" class="form-control" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="tgl_akhir">TANGGAL MULAI</label>
                    <input type="text" name="tgl_awal" value="{{$data->tgl_awal}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="tgl_akhir">TANGGAL SELESAI</label>
                    <input type="text" name="tgl_akhir" value="{{$data->tgl_akhir}}" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="dosen">PENANGGUNGJAWAB</label>
                <input type="text" name="dosen" value="{{$data->dosen}}" class="form-control" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="jabatan">JABATAN PENANGGUNGJAWAB</label>
                    <input type="text" name="jabatan" value="{{$data->jabatan_dosen}}" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="no_dosen">NO. TELEPON PENANGGUNGJAWAB</label>
                    <input type="text" name="no_dosen" value="{{$data->no_dosen}}" class="form-control" readonly>
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <table id="list" width="100%">
                <thead>
                    <td colspan="3"><label for="peneliti">DATA ANGGOTA PENELITIAN (BILA ADA)</label></td>
                </thead>
                @if ($jumlah == 1)
                    <tr>
                        <td><input type="text" value="Tidak Ada Anggota Peneliti" class="form-control" readonly></td>
                    </tr>
                @else
                    @foreach ($anggota as $data => $mahasiswa)
                        <tr>
                            <td>{{$data + 1}}.</td>
                            <td><input type="text" maxlength="8" name="nim" value="{{$mahasiswa->nim}}" class="form-control" readonly></td>
                            <td><input type="text" name="nama" value="{{$mahasiswa->nama}}" class="form-control" readonly></td>
                            <td><input type="text" name="prodi" value="{{$mahasiswa->prodi}}" class="form-control" readonly></td>  
                        </tr>
                    @endforeach
                @endif  
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
