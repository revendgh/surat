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
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
      <thead align="center">
          <tr>
              <th>NO.</th>
              <th>NIM</th>
              <th>Nama Pemohon</th>
              <th>Prodi</th>
              <th>Surat Perihal</th>
              <th>Tanggal Pengajuan</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($master as $data => $master)
          <tr>
            <td align="center">{{$data + 1}}</td>
            <td>{{$master->nim}}</td>
            <td>{{$master->nama}}</td>
            <td>{{$master->prodi}}</td>
            <td>{{$master->jenis_surat}}</td>
            <td align="center">{{\Carbon\Carbon::parse($master->created_at)->format('d-m-Y')}}</td>
            <td align="center"><a href="{{url('/admin/pemohon/'.$master->id)}}"><img src="{{url('gambar/info.png')}}"></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- END CONTENT -->

@endsection