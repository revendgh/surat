@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
    <div class="container-fluid">
        <h3 align=center>TESTING FORM TUGAS MATA KULIAH MAHASISWA</h3><p>
        <div class="card">
            <div class="card-body">

                <!-- FORM CODE -->
                <form action="/mahasiswa/create" method="post">
                    @csrf
                    <div class="form-group">
                        <table id="list">
                            <thead>
                                <td colspan="3">DATA MAHASISWA</td>
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
                        <table id="list-matkul">
                            <thead>
                                <td colspan="2">MATA KULIAH</td>
                            </thead>
                            <tr>  
                                <td><input type="text" name="matkul[]" placeholder="Mata Kuliah" class="form-control"></td>  
                                <td><button type="button" name="add-matkul" id="add-matkul" class="btn btn-success">Tambah</button></td>  
                            </tr>  
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">KEPERLUAN</label><br>
                            <select id="keperluan" class="form-control">
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
                                <input type="text" name="instansi" placeholder="Contoh : Jln. xxxx" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">KABUPATEN/KOTA</label>
                                <input type="text" name="instansi" placeholder="Contoh : Balikpapan" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="tgl_akhir">Tanggal Mulai</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl_awal" class="form-control">
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_akhir">Tanggal Selesai</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl_akhir" class="form-control">
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pemilik">Pemilik No.</label>
                                <input type="text" name="pemilik" placeholder="Nama Pemilik" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">No. Handphone</label>
                                <input type="text" maxlength="12" name="no_hp" placeholder="081xxxxxxxxx" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Pemohon</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="10" rows="10"></textarea>
                    </div>
                    
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
</script>
<!-- END JavaScript -->

@endsection