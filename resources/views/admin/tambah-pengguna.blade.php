<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Tambah Data Pengguna </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Tambah Data Pengguna</li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Tambah Data Pengguna</h4>
						<p class="card-description"> Isi Seluruh Form yang Tersedia </p>
						<form class="forms-sample" method="POST" action="{{ route('addPengguna') }}">
							@csrf
							<div class="form-group">
								<label for="name">Nama</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama">
								@if ($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username">
								@if ($errors->has('username'))
								<span class="text-danger">{{ $errors->first('username') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
								@if ($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
								@if ($errors->has('alamat'))
								<span class="text-danger">{{ $errors->first('alamat') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="no_telepon">No. Telepon</label>
								<input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="No. Telepon">
								@if ($errors->has('no_telepon'))
								<span class="text-danger">{{ $errors->first('no_telepon') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="tipe_pengguna">Tipe Pengguna</label>
								<select class="form-control" id="tipe_pengguna" name="tipe_pengguna">
									<option value="Admin">Admin</option>
									<option value="Pasien">Pasien</option>
									<option value="Dokter">Dokter</option>
								</select>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
								@if ($errors->has('password'))
								<span class="text-danger">{{ $errors->first('password') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label for="password_confirmation">Confirm Password</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
							</div>
							<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
							<a href="{{ route('admin.dashboard') }}" class="btn btn-light">Cancel</a>
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