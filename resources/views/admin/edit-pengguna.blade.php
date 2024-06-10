<!-- Content Login Start -->
@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Update Data Pengguna </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Update Data Pengguna</li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Update Data Pengguna</h4>
						<p class="card-description"> Isi Seluruh Form yang Tersedia </p>
						<form class="forms-sample" method="POST" action="{{ route('updatePengguna', $users->id) }}">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="name">Nama</label>
								<input type="text" name="name" id="name" value="{{ $users->name }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" value="{{ $users->username }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" value="{{ $users->email }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
									<option value="Laki-laki" {{ $users->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
									<option value="Perempuan" {{ $users->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $users->tanggal_lahir }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" id="alamat" value="{{ $users->alamat }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="no_telepon">No. Telepon</label>
								<input type="text" name="no_telepon" id="no_telepon" value="{{ $users->no_telepon }}" class="form-control">
							</div>
							<div class="form-group">
								<label for="tipe_pengguna">Tipe Pengguna</label>
								<select name="tipe_pengguna" id="tipe_pengguna" class="form-control">
									<option value="Admin" {{ $users->tipe_pengguna == 'Admin' ? 'selected' : '' }}>Admin</option>
									<option value="Pasien" {{ $users->tipe_pengguna == 'Pasien' ? 'selected' : '' }}>Pasien</option>
									<option value="Dokter" {{ $users->tipe_pengguna == 'Dokter' ? 'selected' : '' }}>Dokter</option>
								</select>
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