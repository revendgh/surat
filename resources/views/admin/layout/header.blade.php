  <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <center><img id="logo_admin" src="{{url('gambar/Lambang_ITK.png')}}"></center>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="/admin/dashboard">Dashboard</a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Arsip</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="/admin/arsip/terima">Terverifikasi</a>
                    </li>
                    <li>
                        <a href="/admin/arsip/tolak">Ditolak</a>
                    </li>
                    <li>
                        <a href="/admin/arsip/expired">Expired</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
<!-- End Modal -->