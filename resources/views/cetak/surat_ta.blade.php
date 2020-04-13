@extends('cetak.layout.app')

@section('content')

@foreach($data as $item)
        <!-- HEADER SURAT -->
        <div class="row">
            <div class="col-9">
                <div class="text-left">
                    <table width="500px">
                        <tr>
                            <td width="50px">Nomor</td>
                            <td width="5px" align="left">:</td>
                            <td width="345px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                @php echo "/IT10.C.1/AK.05/".date('Y'); @endphp
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Hal</td>
                            <td align="left" valign="top">:</td>
                            <td>{{$item->jenis_surat}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="text-right">
                    {{$tanggal}}
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                Yth. {{$item->tujuan}}<br>
                {{$item->alamat_instansi}}<br>
                {{$item->kab_kota}}
            </div>
        </div>
        <br><br>
        <!-- END HEADER SURAT -->

        <!-- BODY SURAT -->
        <div class="row">
            <div class="col text-justify">
                Yang bertanda tangan dibawah ini menerangkan bahwa yang tersebut dibawah ini: 
            </div>
        </div>

        @if($count_mhs == 1)
        <!-- DATA MAHASISWA INDIVIDU-->
        <div class="row">
            <div class="col">
                <table width="400px">
                    @foreach ($mahasiswa as $data)
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>{{$data->nim}}</td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td>{{$data->prodi}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>No. HP</td>
                        <td>:</td>
                        <td>{{$item->no_hp}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END DATA MAHASISWA INDIVIDU-->
        @else
        <!-- DATA MAHASISWA KELOMPOK-->
        <div class="row">
            <div class="col">
                <table border="1" align="center" width="100%">
                    <col width="5%">
                    <col width="35%">
                    <col width="25%">
                    <col width="35%">
                    <tr align="center">
                        <td><b>NO.</td>
                        <td><b>Nama</td>
                        <td><b>NIM</td>
                        <td><b>Program Studi</td>
                    </tr>
                    @foreach ($mahasiswa as $data => $mahasiswa)    
                        <tr>
                            <td align="center">{{$data + 1}}.</td>
                            <td align="left">{{$mahasiswa->nama}}</td>
                            <td align="center">{{$mahasiswa->nim}}</td>
                            <td align="center">{{$mahasiswa->prodi}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END DATA MAHASISWA KELOMPOK -->
        @endif
        <br><br>

        <div class="row">
            <div class="col text-justify">
                Adalah mahasiswa Institut Teknologi Kalimantan yang akan melaksanakan wawancara, survei dan penyebaran
                kuesioner di {{$item->instansi}} pada {{$item->tgl_awal}} s.d {{$item->tgl_akhir}} untuk keperluan data tugas akhir
                atas nama yang bersangkutan. Selanjutnya mohon diberikan bantuan kepada mahasiswa dimaksud.
                <!-- KONDISI MAHASISWA LEBIH DARI 1 -->
                @if($count_mhs != 1)
                    Adapun kontak person yang dapat dihubungi : {{$item->pemilik_no}} No. HP {{$item->no_hp}}.
                @endif
                <!-- END KONDISI -->

                @if ($item->id_jenis_surat == 3)
                    Adapun wawancara, survei dan penyebaran kuesioner
                @else
                    Adapun data
                @endif
                dimaksud adalah sebagai berikut:
                
                <table width="100%">
                    @foreach ($keterangan as $data => $keterangan)
                        <tr>
                            <td width="5%">{{$data + 1}}.</td>
                            <td width="95%">{{$keterangan->keterangan}}</td>
                        </tr>
                    @endforeach
                </table>
                <br>
                Atas kerjasama dan perhatian yang diberikan, kami ucapkan terima kasih.
            </div>
        </div>
        <br><br>
        <!-- END BODY SURAT -->
@endforeach

@endsection