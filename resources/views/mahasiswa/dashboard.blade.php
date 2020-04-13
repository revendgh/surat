@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
  <div class="container-fluid">
    <h3 align=center>TESTING DASHBOARD MAHASISWA</h3><p>
      @if(\Session::get('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
      @endif
    <div class="row justify-content-center">
      <div class="card-deck">
        <a href="/mahasiswa/ta">
          <div class="card text-white bg-primary" id="tes-card" style="max-width: 18rem;">
            <div class="card-body justify-content-center">
            <img class="rounded mx-auto d-block" src="{{url('gambar/skripsi.png')}}" alt="logo_ta" width="100px" height="100px"><br>
              <center>TUGAS AKHIR</center>
            </div>
          </div>
        </a>
        <a href="/mahasiswa/matkul">
          <div class="card text-white bg-primary" id="tes-card" style="max-width: 18rem;">
            <div class="card-body justify-content-center">
              <img class="rounded mx-auto d-block" src="{{url('gambar/matkul.png')}}" alt="logo_matkul;" width="100px" height="100px"><br>
                <center>TUGAS MATA KULIAH</center>
            </div>
          </div>
        </a>
        <a href="/mahasiswa/ta/dpm">
          <div class="card text-white bg-primary" id="tes-card" style="max-width: 18rem;">
            <div class="card-body justify-content-center">
              <img class="rounded mx-auto d-block" src="{{url('gambar/file.png')}}" alt="logo_matkul;" width="100px" height="100px"><br>
                <center>SURAT KETERANGAN</center>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->

@endsection