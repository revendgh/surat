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

<body>
    <div class="inner-bg">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div class="card-padding">
                    <div class="card-header-padding">
                        <h3 align="center">
                            E-Surat<br>
                            ITK
                        </h3>
                    </div>
                    <div class="card-body">
                        <table cellpadding="20">
                            <tr>
                                <td>
                                    <a href="/mahasiswa">
                                        <button class="btn btn-primary">
                                            Halaman<br>
                                            Mahasiswa
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Halaman<br>
                                        Admin
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
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