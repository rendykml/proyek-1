@include('admin.header-dashboard')

@include('admin.navbar-dashboard')

@include('admin.sidebar-dashboard')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title"> Tambah Jadwal Dokter </h3>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Dokter</li>
				</ol>
			</nav>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Tambah Jadwal Dokter</h4>
						<p class="card-description"> Isi Seluruh Form yang Tersedia </p>
						<form class="forms-sample" method="POST" action="{{ route('addJadwal') }}">
							@csrf
							<div class="form-group">
								<label for="doctor_id">Pilih Dokter</label>
								<select class="form-control" id="doctor_id" name="doctor_id">
									@foreach($jadwals as $jadwal)
									<option value="{{ $jadwal->doctor_id }}">
										{{ $jadwal->user->name }} - {{ $jadwal->spesialisasi }}
									</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="hari">Hari</label>
								<input type="text" class="form-control" id="hari" name="hari" required>
							</div>
							<div class="form-group">
								<label for="jam_mulai">Jam Mulai</label>
								<input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
							</div>
							<div class="form-group">
								<label for="jam_selesai">Jam Selesai</label>
								<input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
							</div>
							<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
							<a href="{{ route('admin.dashboard-jadwal') }}" class="btn btn-light">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
	<footer class="footer">
		<div class="container-fluid d-flex justify-content-between">
			<span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
			<span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
		</div>
	</footer>
</div>
@include('admin.footer-dashboard')