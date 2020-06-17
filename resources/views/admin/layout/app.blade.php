<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/testing.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('DataTables/datatables.css')}}" rel="stylesheet" type="text/css">
    <script src="{{url('jquery/jquery.js')}}"></script>
    <script src="{{url('DataTables/datatables.js')}}"></script>
    <script src="{{url('js/_solid.js')}}"></script>
    <script src="{{url('js/_fontawesome.js')}}"></script>
    
    <title>
        E-Surat
    </title>
    
    @section('css')
    @show
</head>
<body>
    <div class="wrapper">

    @include('admin.layout.header')
    @yield('content')

    </div>

    @include('admin.layout.footer')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
      </script>
    
      <script type="text/javascript">
        $(document).ready( function () {
          $('#table_id').DataTable();
        } );
      </Script>


    <script type="text/javascript" src="{{url('jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('DataTables/datatables.js')}}"></script>
    
    @section('js')
    @show
</body>
</html>