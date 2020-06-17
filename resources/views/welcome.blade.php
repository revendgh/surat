<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/testing.css')}}" rel="stylesheet" type="text/css">
<head>
    <title>
        E-Surat
    </title>
</head>

<body style="background-color: #013880">
    <div class="inner-welcome">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="box">
                    <center><img id="logo_welcome" src="{{url('gambar/itk.png')}}"></center>
                    <h2 id="judul"><center>Sistem Aplikasi E-Surat</center></h2>
                    <h2><center>Masuk Sebagai</center></h2><p>
                    <div class="row">
                        <div class="col-md-6"><center>
                            <a href="/mahasiswa"><button class="btn btn-white form-control">
                                <img src="{{url('gambar/mhs.png')}}"><br>
                                PEMOHON
                            </button></a></center>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-white form-control" data-toggle="modal" data-target="#myModal">
                                <img src="{{url('gambar/admin.png')}}"><br>
                                ADMINISTRATOR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <footer><Center>Copyright © 2020 Institut Teknologi Kalimantan</Center> </footer>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Login Page E-Surat</h4>
                    </div>
                    <form action="/admin" method="post">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user">USERNAME :</label>
                                    <input type="text" name="username" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <label for="user">PASSWORD :</label>
                                    <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                        </div>
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>

<script type="text/javascript" src="{{url('jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
</body>
</html>