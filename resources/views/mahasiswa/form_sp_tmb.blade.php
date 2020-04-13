@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
    <div class="container-fluid">
        <h3 align=center>
            TESTING FORM SURAT PERNYATAAN TIDAK SEDANG MENERIMA BEASISWA
        </h3><p>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="card">
            <div class="card-body">

                <!-- FORM CODE -->
                <form action="/mahasiswa/create_sp" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="mahasiswa">DATA MAHASISWA</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <input type="text" maxlength="8" name="nim" placeholder="NIM" class="form-control">                    
                        </div>
                        <div class="form-group col-md-4">
                            <label for="semester" hidden>DATA MAHASISWA</label>
                                <input type="text" name="nama" placeholder="Nama" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="semester" hidden>DATA MAHASISWA</label>
                                <input type="text" name="prodi" placeholder="Prodi" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">TEMPAT LAHIR</label>
                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">TANGGAL LAHIR</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl_lahir" class="form-control">
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="semester">SEMESTER</label>
                                <input type="text" maxlength="1" name="semester" placeholder="Semester" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ipk">IPK</label>
                                <input type="text" maxlength="4" name="ipk" placeholder="0.00" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tahun">TAHUN AJARAN</label>
                                <select name="tahun" id="tahun" class="form-control">
                                    <option value="{{date('Y')-1}}/{{date('Y')}}">{{date('Y')-1}}/{{date('Y')}}</option>
                                    <option value="{{date('Y')}}/{{date('Y')+1}}">{{date('Y')}}/{{date('Y')+1}}</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_awal">ALAMAT ASAL</label><br>
                            <input type="text" name="alamat_asal" placeholder="Alamat Asal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat_awal">ALAMAT SEKARANG</label><br>
                            <input type="text" name="alamat_skrg" placeholder="Alamat Sekarang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat_awal">NO. HANDPHONE</label><br>
                            <input type="text" maxlength="12" name="no_hp" placeholder="08xxxxxx" class="form-control">
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-primary form-control">SUBMIT</button>
                </form>
                <!-- END FORM CODE -->
                
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

@endsection