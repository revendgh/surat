<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @include('cetak.layout.style');
    </style>
    
    <title>
        E-Surat
    </title>
</head>
<body>
    <div class="container-fluid" id="font_cetak">
        <div class="text-center">
            <h5>
                <b>
                SURAT PERNYATAAN<br>
                TIDAK SEDANG MENERIMA BEASISWA<hr>
                </b>
            </h5>
        </div>
        
        <!-- BODY SURAT -->
        <div class="row">
            <div class="col text-justify">
                Yang bertanda tangan dibawah ini: 
            </div>
        </div>
        <br><br>

        @foreach ($data as $item)
            
        <!-- DATA PEMOHON -->
        <div class="row">
            <div class="col">
                <table width="100%">
                    @foreach ($mahasiswa as $data => $mahasiswa)
                    <tr>
                        <td width="23%">Nama</td>
                        <td width="2%">:</td>
                        <td width="75%">{{$mahasiswa->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tgl Lahir</td>
                        <td>:</td>
                        <td>{{$mahasiswa->tempat}}, {{$mahasiswa->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>{{$mahasiswa->nim}}</td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td>{{$mahasiswa->prodi}}</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>{{$item->semester}}</td>
                    </tr>
                    <tr>
                        <td>IPK</td>
                        <td>:</td>
                        <td>{{$item->ipk}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat Asal</td>
                        <td align="left" valign="top">:</td>
                        <td>{{$mahasiswa->alamat_asal}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat Sekarang</td>
                        <td align="left" valign="top">:</td>
                        <td>{{$mahasiswa->alamat_skrg}}</td>
                    </tr>
                    <tr>
                        <td>No. Handphone</td>
                        <td>:</td>
                        <td>{{$item->no_hp}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <!-- END DATA PEMOHON -->

        <div class="row">
            <div class="col text-justify">
                Dengan ini menyatakan bahwa saya tidak sedang menerima beasiswa pada Tahun Akademik
                {{$item->tahun_akademik}} baik dari sumber APBN/APBD dan Swasta di lingkungan ITK. Bahwa apabila
                saya membuat keterangan palsu maka saya akan diproses secara hukum dan berkewajiban
                mengembalikan dana beasiswa yang saya terima.<br>
                Demikian surat pernyataan ini dibuat dengan sebenar-benarnya dan dipergunakan
                sebagaimana mestinya.
            </div>
        </div>
        <br><br>
        <!-- END BODY SURAT -->
        
        <!-- TTD -->
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
        <br><br>

        <div class="row">
            <div class="col">
                <table width="100%">
                    <tr>
                        <td width="75%">
                            Mengetahui,<br>
                            Wakil Rektor Bidang Akademi<br><br><br><br><br><br>
                            Nurul Widiastuti, S.Si., M.Si., Ph.D<br>
                            NIP. 197104251994122001
                        </td>
                        <td width="50%">
                            Pemohon,<br><br><br><br><br><br><br>
                                {{$mahasiswa->nama}}<br>
                                NIM. {{$mahasiswa->nim}}    
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END TTD -->
        @endforeach
        @endforeach
    </div>
</body>
</html>