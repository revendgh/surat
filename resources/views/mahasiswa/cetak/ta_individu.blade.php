<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/testing.css')}}" rel="stylesheet" type="text/css">
    <script src="{{url('jquery/jquery.js')}}"></script>
    
    <title>
        E-Surat
    </title>

<body>
    <div class="container" id="font_cetak">
        <!-- COP SURAT -->
        <div class="row justify-content-center">
            <img src="{{url('gambar/Logo Surat.png')}}" id="cop_surat" alt="">
        </div>
        <!-- END COP SURAT -->

        <!-- HEADER SURAT -->
        <p>
        <div class="row">
            <div class="col-9">
                <div class="text-left">
                    <table width="500px">
                        <tr>
                            <td>Nomor</td>
                            <td width="5%" align="center">:</td>
                            <td>&emsp;&nbsp;/IT10.C.1/AK.05/2020</td>
                        </tr>
                        <tr>
                            <td valign="top">Hal</td>
                            <td width="5%" align="center" valign="top">:</td>
                            <td>Permohonan Wawancara, Survei dan Penyebaran Kuesioner Untuk Tugas Akhir</td>
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
        <div class="row">
            <div class="col">
            </div>
        </div>
        <p>
        <div class="row">
            <div class="col">
                Yth. Kepala SMK Negeri 4 Balikpapan<br>
                Jalan Belibis, Gunung Guntur<br>
                Balikpapan
            </div>
        </div>
        <br>
        <!-- END HEADER SURAT -->

        <!-- BODY SURAT -->
        <div class="row">
            <div class="col text-justify">
                Yang bertanda tangan dibawah ini menerangkan bahwa yang tersebut dibawah ini:
            </div>
        </div>

        <!-- DATA MAHASISWA -->
        <div class="row">
            <div class="col">
                <table width="400px">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>Ridho Wibi Pradana</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>16615018</td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td>Teknik Informatika</td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td>:</td>
                        <td>085247625749</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <!-- END DATA MAHASISWA -->

        <div class="row">
            <div class="col text-justify">
                Adalah mahasiswa Institut Teknologi Kalimantan yang akan melaksanakan wawancara, survei dan penyebaran
                kuesioner di SMK Negeri 4 Balikpapan pada {{$tanggal}} s.d {{$tanggal}} untuk keperluan data tugas akhir
                atas nama yang bersangkutan. Selanjutnya mohon diberikan bantuan kepada mahasiswa dimaksud. Adapun wawancara,
                survei dan penyebaran kuesioner dimaksud adalah sebagai berikut:
                
                <table>
                    <tr>
                        <td>1.</td>
                        <td>bla bla</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>bla bla</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>bla bla</td>
                    </tr>
                </table>
                <br>
                Atas kerjasama dan perhatian yang diberikan, kami ucapkan terima kasih
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col justify-content-end">
                <table align="right">
                    <tr>
                        <td>
                            Kasubag Akademik dan Kemahasiswaan,<br><br><br><br>
                            Aries Rohiyanto<p>
                            NIP 1231231231233121
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="{{url('jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
</body>
</html>