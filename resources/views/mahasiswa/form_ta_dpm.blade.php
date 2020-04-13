@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
    <div class="container-fluid">
        <h3 align=center>TESTING FORM TUGAS AKHIR MAHASISWA<br>
                        TUJUAN DINAS PENANAMAN MODAL</h3><p>
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
                <form action="/mahasiswa/create_ta_dpm" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="mahasiswa">DATA PENELITI</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <input type="text" maxlength="8" name="nim_p" placeholder="NIM" class="form-control">                    
                        </div>
                        <div class="form-group col-md-4">
                            <label for="semester" hidden>DATA MAHASISWA</label>
                                <input type="text" name="nama_p" placeholder="Nama" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="semester" hidden>DATA MAHASISWA</label>
                                <input type="text" name="prodi_p" placeholder="Prodi" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alamat">ALAMAT PENELITI</label>
                                <input type="text" name="alamat" placeholder="Contoh : Jln. xxxx" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_mhs">NO. TELEPON PENELITI</label>
                                <input type="text" maxlength="12" name="no_mhs" placeholder="08xxxxxxxxx" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">JUDUL PENELITIAN</label>
                            <input type="text" name="judul" placeholder="JUDUL" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instansi">LOKASI PENELITIAN</label>
                            <input type="text" name="instansi" placeholder="Lokasi Penelitian" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="tgl_akhir">TANGGAL MULAI</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl_awal" class="form-control">
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_akhir">TANGGAL SELESAI</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl_akhir" class="form-control">
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dosen">PENANGGUNGJAWAB</label>
                            <input type="text" name="dosen" placeholder="Dosen" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jabatan">JABATAN PENANGGUNGJAWAB</label>
                                <input type="text" name="jabatan" placeholder="Jabatan Dosen" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_dosen">NO. TELEPON PENANGGUNGJAWAB</label>
                                <input type="text" maxlength="12" name="no_dosen" placeholder="08xxxxxxxxx" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <table id="list">
                            <thead>
                                <td colspan="3"><label for="peneliti">DATA ANGGOTA PENELITIAN (BILA ADA)</label></td>
                            </thead>
                            <tr>
                                <td width="5%">1.</td>     
                                <td><input type="text" maxlength="8" name="nim[]" placeholder="NIM" class="form-control"></td>
                                <td><input type="text" name="nama[]" placeholder="Nama" class="form-control"></td>
                                <td><input type="text" name="prodi[]" placeholder="Prodi" class="form-control"></td>  
                                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>  
                            </tr>  
                        </table>
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

<!-- JavaScript Untuk Dynamic NAME -->
<script type="text/javascript">
    $(document).ready(function(){      
        var i=1;  

        $('#add').click(function(){  
            i++;  
            $('#list').append('<tr id="row'+i+'" class="dynamic-added"><td width="5%">'+i+'</td><td><input type="text" name="nim[]" placeholder="NIM" class="form-control"/></td><td><input type="text" name="nama[]" placeholder="NAMA" class="form-control"/></td><td><input type="text" name="prodi[]" placeholder="PRODI" class="form-control"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });  

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();
            i--;  
        });
    });

    $(document).ready(function(){      
        var i=1;

        $('#add-keterangan').click(function(){  
            i++;  
            $('#list-keterangan').append('<tr id="row'+i+'" class="dynamic-added"><td width="5%">'+i+'</td><td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();
            i--;  
        });
    });
</script>
<!-- END JavaScript -->

@endsection