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
    
    @section('css')
    @show
</head>
<body>

    @include('mahasiswa.layout.header')
    @yield('content')
    @include('mahasiswa.layout.footer')

    <script type="text/javascript" src="{{url('jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    
    @section('js')
    @show
</body>
</html>