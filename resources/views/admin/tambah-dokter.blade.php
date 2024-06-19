<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Tambah Data Dokter </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard-dokter') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data Dokter</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Data Dokter</h4>
                    <p class="card-description"> Isi Seluruh Form yang Tersedia </p>
                    <form class="forms-sample" method="POST" action="{{ route('addDokter') }}">
                        @csrf
                      <div class="form-group">
                        <label for="user_id">Pilih Dokter</label>
                        <select class="form-control" id="user_id" name="user_id">
                          @foreach($dokter as $dokters)
                          <option value="{{ $dokters->id }}">{{ $dokters->name }}</option>
                          @endforeach
                        </select>
							        </div>  
                      

                      <div class="form-group">
                        <label for="name">Spesialisasi</label>
                        <input type="text" class="form-control" id="Spesialisasi" name="Spesialisasi" value="{{ old('Spesialisasi') }}" placeholder="Spesialisasi">
                        @if ($errors->has('Spesialisasi'))
										<span class="text-danger">{{ $errors->first('Spesialis') }}</span>
										@endif
                      </div>

                      <div class="form-group">
                        <label for="name">Kualifisasi</label>
                        <input type="text" class="form-control" id="Kualifikasi" name="Kualifikasi" value="{{ old('Kualifikasi') }}" placeholder="Kualifikasi">
                        @if ($errors->has('Kualifikasi'))
										<span class="text-danger">{{ $errors->first('Kualifikasi') }}</span>
										@endif
                      </div>

                      <div class="form-group">
                        <label for="name">Pengalaman</label>
                        <input type="text" class="form-control" id="Pengalaman" name="Pengalaman" value="{{ old('Pengalaman') }}" placeholder="Pengalaman">
                        @if ($errors->has('Pengalaman'))
										<span class="text-danger">{{ $errors->first('Pengalaman') }}</span>
										@endif
                      </div>

                      
                      

                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="{{ route('admin.dashboard-dokter') }}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>

@include('admin.footer-dashboard')