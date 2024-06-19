<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dokter
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="card-body">
                <a href="{{ route('admin.tambah-dokter') }}" class="btn btn-success">Tambah Data Dokter</a>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Dokter</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> Jenis Kelamin </th>
                            <th> Tanggal Lahir </th>
                            <th> Alamat </th>
                            <th> No. Telepon </th>
                            <th> Spesialisasi </th>
                            <th> Kualifikasi </th>
                            <th> Pengalaman </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $index => $dokter)
                        <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dokter->name }}</td>
                        <td>{{ $dokter->email }}</td>
                        <td>{{ $dokter->jenis_kelamin }}</td>
                        <td>{{ $dokter->tanggal_lahir }}</td>
                        <td>{{ $dokter->alamat }}</td>
                        <td>{{ $dokter->no_telepon }}</td>
                        <td>{{ $dokter->spesialisasi }}</td>
                        <td>{{ $dokter->kualifikasi }}</td>
                        <td>{{ $dokter->pengalaman }}</td>
                        <td>
                          <a href="{{ route('admin.edit-dokter', $dokter->doctor_id) }}" class="btn btn-primary">Edit</a>
											    <form action="{{ route('deleteDokter', $dokter->doctor_id) }}" method="POST" style="display:inline;">
												  @csrf
												  @method('DELETE')
												  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">Delete</button>
											    </form>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@include('admin.footer-dashboard')