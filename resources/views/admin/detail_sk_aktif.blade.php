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
                <tr>
                @foreach ($mahasiswa as $data)
                    <td><input type="text" maxlength="8" name="nim" value="{{$data->nim}}" class="form-control" readonly></td>
                    <td><input type="text" name="nama" value="{{$data->nama}}" class="form-control" readonly></td>
                    <td><input type="text" name="prodi" value="{{$data->prodi}}" class="form-control" readonly></td>  
                @endforeach
                </tr>  
            </table>
        </div>
        @foreach ($surat as $data)
        <div class="form-group">
            <label for="keperluan">KEPERLUAN PEMOHON</label><br>
                <input type="text" name="keperluan" value="{{$data->keterangan}}" class="form-control" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="semester">SEMESTER</label>
                    @if ($data->semester == 1)
                        <input type="text" name="keperluan" value="Ganjil" class="form-control" readonly>
                    @else
                        <input type="text" name="keperluan" value="Genap" class="form-control" readonly>
                    @endif
            </div>
            <div class="form-group col-md-6">
                <label for="tahun">TAHUN AJARAN</label>
                    <input type="text" name="keperluan" value="{{$data->tahun_akademik}}" class="form-control" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            @if ($data->status == null)
                <div class="col-sm-8">
                    <a href="/admin/dashboard" class="btn btn-primary"><b><- Kembali</b></a>
                </div>
                <div class="col-sm-2">
                    <a href="{{url('/admin/tolak/'.$data->id)}}" class="btn btn-danger form-control"><b>Tolak</b></a>
                </div>
                <div class="col-sm-2" style="text-align: right">
                    <a href="{{url('/admin/terima/'.$data->id)}}" class="btn btn-success form-control"><b>Terima</b></a>
                </div>
            @else
                <div class="col-sm-8">
                    <a href="/admin/arsip" class="btn btn-primary"><b><- Kembali</b></a>
                </div>
                <div class="col-sm-4" style="text-align: right">
                    <a href="{{url('/admin/cetak/'.$data->id)}}" class="btn btn-success form-control"><b>Cetak</b></a>
                </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

@endsection
