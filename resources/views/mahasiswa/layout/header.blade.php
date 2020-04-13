  <!-- HEADER -->
  <div class="header">
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="/cetak"><img id="logo" src="{{url('gambar/Lambang_ITK.png')}}">
          E-surat    
      </a>
      <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="/mahasiswa">DASHBOARD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="" data-toggle="modal" data-target="#myModal">LOGIN</a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- END HEADER -->

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