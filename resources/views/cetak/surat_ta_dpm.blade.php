@extends('cetak.layout.app')

@section('content')

@foreach ($data as $item)

    <p>
    <!-- No Surat -->
    <div class="row">
        <div class="text-center" id="dpm">
            <b><u>PERMOHONAN IZIN PENELITIAN</u></b><br>
            Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/IT10.C.1/AK.05/{{date('Y')}}
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col">
            <div class="text-left">
                <table width="100%">
                    <tr>
                        <td valign="top">Yth.</td>
                        <td align="left" valign="top">:</td>
                        <td>
                            Kepala Dinas Penanaman Modal dan Perizinan Terpadu Kota Balikpapan<br>
                            Di - Balikpapan
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <!-- END No Surat -->
    
    <!-- BODY SURAT -->
    <div class="row">
        <div class="col text-justify">
            Yang bertanda tangan dibawah ini: 
        </div>
    </div>
    <br>

    <!-- DATA PEMOHON-->
    <div class="row text-justify">
        <div class="col">
            <table width="100%">
                <tr>
                    <td style="width:5%">a.</td>
                    <td style="width:35%">Nama Pemohon</td>
                    <td style="width:2%">:</td>
                    <td style="width:58%">Ridho Wibi Pradana</td>
                </tr>
                <tr>
                    <td>b.</td>
                    <td>Jabatan Pemohon</td>
                    <td>:</td>
                    <td>Mahasiswa</td>
                </tr>
                <tr>
                    <td>c.</td>
                    <td>Perguruan Tinggi</td>
                    <td>:</td>
                    <td>Institut Teknologi Kalimantan</td>
                </tr>
                <tr align="left" valign="top">
                    <td>d.</td>
                    <td>Alamat Pemohon</td>
                    <td>:</td>
                    <td>Jln. Veteran RT.4 No.21 Desa Anggana, Kecamatan Anggana, Kab. Kutai Kartanegara</td>
                </tr>
                <tr>
                    <td>e.</td>
                    <td>No. Telepon Pemohon</td>
                    <td>:</td>
                    <td>085212345678</td>
                </tr>
                <tr align="left" valign="top">
                    <td>f.</td>
                    <td>Judul Penelitian</td>
                    <td>:</td>
                    <td>Rancang Bangun Sistem Informasi Puskesmas Kecamatan Anggana Berbasis Web</td>
                </tr>
                <tr align="left" valign="top">
                    <td>g.</td>
                    <td>Lokasi Penelitian</td>
                    <td>:</td>
                    <td>Dinas Pendidikan dan Kebudayaan Kota Balikpapan</td>
                </tr>
                <tr>
                    <td>h.</td>
                    <td>Waktu Penelitian</td>
                    <td>:</td>
                    <td>{{$tanggal}} s/d {{$tanggal}}</td>
                </tr>
                <tr>
                    <td>i.</td>
                    <td>Nama Penanggungjawab</td>
                    <td>:</td>
                    <td>M. Ihsan Alfani Putera S. Tr. Kom, M. Kom.</td>
                </tr>
                <tr>
                    <td>j.</td>
                    <td>Jabatan Penanggungjawab</td>
                    <td>:</td>
                    <td>Dosen Sistem Informasi</td>
                </tr>
                <tr>
                    <td>k.</td>
                    <td>Perguruan Tinggi</td>
                    <td>:</td>
                    <td>Institut Teknologi Kalimantan</td>
                </tr>
                <tr>
                    <td>l.</td>
                    <td>Alamat Perguruan Tinggi</td>
                    <td>:</td>
                    <td>Km. 15 Karang Joang</td>
                </tr>
                <tr>
                    <td>m.</td>
                    <td>No. Telepon Penanggungjawab</td>
                    <td>:</td>
                    <td>085212345678</td>
                </tr>
                <tr align="left" valign="top">
                    <td>n.</td>
                    <td>Anggota Tim Peneliti</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
            </table>
        </div>
    </div>
    <br><br>
    <!-- END DATA PEMOHON-->

    <div class="row">
        <div class="col text-justify">
            Bersama ini mengajukan permohonan Izin Penelitian sebagaimana tersebut diatas dengan ketentuan:
        </div>
    </div>
    <div class="row">
        <div class="col text-justify">
            <table width="100%">
                <tr>
                    <td align="left" valign="top">1.</td>
                    <td width="95%">
                        Bersedia memberitahukan maksud dan tujuan penelitian kepada Pihak Terkait sebelum
                        melakukan kegiatan.
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">2.</td>
                    <td>
                        Tidak melakukan kegiatan yang tidak sesuai dengan judul penelitian dimaksud tersebut
                        diatas.
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">3.</td>
                    <td>
                        Bersedia menyampaikan laporan hasil penelitian yang dilakukan kepada Walikota Balikpapan
                        Cq. Dinas Penanaman Modal dan Perizinan Terpadu Kota Balikpapan.
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col justify-content-end">
            <table width="271px" align="right">
                <tr>
                    <td>
                        Balikpapan, {{$tanggal}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>

@endforeach

@endsection