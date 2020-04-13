@extends('mahasiswa.layout.app')

@section('content')

<!-- CONTENT -->
<div class="inner-dashboard">
    <div class="container-fluid">
        <h3 align=center>TESTING FORM SURAT KETERANGAN</h3><p>
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
                <form action="/mahasiswa/create_sk" method="post">
                    @csrf
                    <div class="form-group">
                        <table id="list" width="100%">
                            <thead>
                                <td colspan="3"><label for="mahasiswa">DATA MAHASISWA</label></td>
                            </thead>
                            <tr>  
                                <td><input type="text" maxlength="8" name="nim" placeholder="NIM" class="form-control"></td>
                                <td><input type="text" name="nama" placeholder="Nama" class="form-control"></td>
                                <td><input type="text" name="prodi" placeholder="Prodi" class="form-control"></td>  
                            </tr>  
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">KEPERLUAN PEMOHON</label><br>
                            <input type="text" name="keperluan" placeholder="Keperluan" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="semester">SEMESTER</label>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="1">GANJIL</option>
                                    <option value="2">GENAP</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tahun">TAHUN AJARAN</label>
                                <select name="tahun" id="semester" class="form-control">
                                    <option value="{{date('Y')-1}}/{{date('Y')}}">{{date('Y')-1}}/{{date('Y')}}</option>
                                    <option value="{{date('Y')}}/{{date('Y')+1}}">{{date('Y')}}/{{date('Y')+1}}</option>
                                </select>
                        </div>
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
</script>
<!-- END JavaScript -->

@endsection