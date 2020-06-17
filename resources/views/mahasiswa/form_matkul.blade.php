@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
    <div class="container-fluid">
        <h3 align=center>TESTING FORM TUGAS MATA KULIAH MAHASISWA</h3><p>
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
                <form action="/mahasiswa/create_matkul" method="post">
                    @csrf
                    <div class="form-group">
                        <table id="list" width="60%">
                            <thead>
                                <td colspan="3"><label for="mahasiswa">DATA MAHASISWA</label></td>
                            </thead>
                            <tr>  
                                <td><input type="text" maxlength="8" name="nim[]" placeholder="NIM" class="form-control"></td>
                                <td><input type="text" name="nama[]" placeholder="Nama" class="form-control"></td>
                                <td><input type="text" name="prodi[]" placeholder="Prodi" class="form-control"></td>  
                                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>  
                            </tr>  
                        </table>
                    </div>
                    <div class="form-group">
                        <table id="list-matkul" width="60%">
                            <thead>
                                <td colspan="2"><label for="matkul">MATA KULIAH</label></td>
                            </thead>
                            <tr>
                                <td><input type="text" name="matkul[]" placeholder="Mata Kuliah" class="form-control"></td>  
                                <td><button type="button" name="add-matkul" id="add-matkul" class="btn btn-success">Tambah</button></td>  
                            </tr>  
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">KEPERLUAN</label><br>
                            <select id="keperluan" name="keperluan" class="form-control">
                                <option>-</option>
                                @foreach ($jenis_surat as $jenis)
                                    <option value="{{$jenis->id}}">{{$jenis->jenis_surat}}</option>                                
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">TUJUAN SURAT</label>
                            <input type="text" name="tujuan" placeholder="Contoh : Kepala Dinas bla bla bla" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tujuan">INSTANSI</label>
                            <input type="text" name="instansi" placeholder="Contoh : SMK Negeri bla bla" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tujuan">ALAMAT INSTANSI</label>
                                <input type="text" name="alamat" placeholder="Contoh : Jln. xxxx" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">KABUPATEN/KOTA</label>
                                <input type="text" name="kota" placeholder="Contoh : Balikpapan" class="form-control">
                        </div>
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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pemilik">PEMILIK NO.</label>
                                <input type="text" name="pemilik" placeholder="Nama Pemilik" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">NO. HANDPHONE</label>
                                <input type="text" maxlength="12" name="no_hp" placeholder="081xxxxxxxxx" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <table id="list-keterangan" width="60%">
                            <thead>
                                <td colspan="2"><label for="keterangan">KETERANGAN PEMOHON</label></td>
                            </thead>
                            <tr>
                                <td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control"></td>  
                                <td><button type="button" name="add-keterangan" id="add-keterangan" class="btn btn-success">Tambah</button></td>  
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
            $('#list').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="nim[]" placeholder="NIM" class="form-control"/></td><td><input type="text" name="nama[]" placeholder="Nama" class="form-control"/></td><td><input type="text" name="prodi[]" placeholder="Prodi" class="form-control"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });
    });

    $(document).ready(function(){      
        var i=1;

        $('#add-matkul').click(function(){  
            i++;  
            $('#list-matkul').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="matkul[]" placeholder="Mata Kuliah" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });
    });

    $(document).ready(function(){      
        var i=1;

        $('#add-keterangan').click(function(){  
            i++;  
            $('#list-keterangan').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="keterangan[]" placeholder="Keterangan Pemohon" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });

        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });
    });
</script>
<!-- END JavaScript -->

@endsection